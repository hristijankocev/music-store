<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Item;
use App\Models\Pivots\TrackArtist;
use App\Models\Pivots\TrackGenre;
use App\Models\Track;
use App\Models\TrackDetails;
use App\Rules\Duration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TrackController extends Controller
{
    public function index()
    {

        $tracks = TrackDetails::paginate(5);

        return view('track.index')->with([
            'tracks' => $tracks
        ]);
    }

    public function store(Request $request)
    {
        // Check if the user selected an album
        $album_id = $request['album_id'];
        if (isset($album_id) && $album_id === 'null') {
            $request->request->remove('album_id');
        }

        // Check if the user selected any artists
        $artists = $request['artists'];
        if (isset($artists)) {
            foreach ($artists as $artist) {
                if ($artist === 'null') {
                    $request->request->remove('artists');
                    break;
                }
            }
        }

        // Check if the user selected any genres
        $genres = $request['artists'];
        if (isset($genres)) {
            foreach ($genres as $genre) {
                if ($genre === 'null') {
                    $request->request->remove('genres');
                    break;
                }
            }
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'length' => ['required', 'string', new Duration],
            'album_id' => ['sometimes', 'integer', 'exists:App\Models\Album,id'],
            'artists' => ['sometimes', 'array'],
            'artists.*' => ['sometimes', 'integer', 'distinct', 'exists:App\Models\Artist,id'],
            'genres' => ['sometimes', 'array'],
            'genres.*' => ['sometimes', 'integer', 'distinct', 'exists:App\Models\Genre,id'],
            'price' => ['required', 'numeric']
        ]);

        $item = Item::factory()->create(['price' => $validated['price']]);
        $item->save();

        $validated['id'] = $item->id;

        $track = Track::factory()->create([
            'id' => $validated['id'],
            'name' => $validated['name'],
            'length' => $validated['length'],
            'album_id' => $validated['album_id'] ?? null
        ]);

        $item->itemable()->associate($track)->save();

        // Create the track_artists relationship if the user selected any artists
        if (array_key_exists('artists', $validated)) {
            foreach ($validated['artists'] as $id) {
                TrackArtist::factory()
                    ->create(['track_id' => $track->id, 'artist_id' => $id]);
            }
        }

        // Create the track_genres relationship if the user selected any genres
        if (array_key_exists('genres', $validated)) {
            foreach ($validated['genres'] as $id) {
                TrackGenre::factory()
                    ->create(['track_id' => $track->id, 'genre_id' => $id]);
            }
        }

        Session::flash('message', 'Track added successfully!');
        return redirect(route('tracks'));
    }

    public function create()
    {
        return view('track.create')
            ->with([
                'albums' => Album::all(),
                'artists' => Artist::all(),
                'genres' => Genre::all(),
            ]);
    }
}
