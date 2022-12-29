<?php

namespace Database\Factories\pivots;

use App\Models\Genre;
use App\Models\Pivots\TrackGenre;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrackGenre>
 */
class TrackGenreFactory extends Factory
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
            'genre_id' => Genre::factory()
        ];
    }
}
