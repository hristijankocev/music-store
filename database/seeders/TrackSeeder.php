<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Item;
use App\Models\Pivots\TrackArtist;
use App\Models\Pivots\TrackGenre;
use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $genres = Genre::all();
        $artists = Artist::all();

        // Make tracks (singles)
        Item::factory(5)->make()->each(function ($item) use ($genres, $artists) {
            $item->save();

            $track = Track::factory()
                ->create(['id' => $item->id, 'album_id' => null]);

            $item->itemable()->associate($track)->save();

            TrackGenre::factory()->create(['track_id' => $track->id,
                'genre_id' => $genres[0]->id]);
        });

        // Make tracks which are a part of an album
        $albumItem = Item::factory()->create();
        $albumItem->save();
        $album = Album::factory()->create(['id' => $albumItem->id, 'name' => 'Matahari']);
        $albumItem->itemable()->associate($album)->save();
//        $album->save();

        Item::factory(5)->make()->each(function ($item) use ($album, $genres, $artists) {
            $item->save();
            $track = Track::factory()
                ->create(['id' => $item->id, 'album_id' => $album->id]);

            $item->itemable()->associate($track)->save();

            TrackGenre::factory()->create(['track_id' => $track->id,
                'genre_id' => $genres[1]->id]);

            TrackArtist::factory()->create(['track_id' => $track->id,
                'artist_id' => $artists[0]->id]);
        });
    }
}
