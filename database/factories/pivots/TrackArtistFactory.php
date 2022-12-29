<?php

namespace Database\Factories\pivots;

use App\Models\Artist;
use App\Models\Pivots\TrackArtist;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrackArtist>
 */
class TrackArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'track_id' => Track::factory(),
            'artist_id' => Artist::factory()
        ];
    }
}
