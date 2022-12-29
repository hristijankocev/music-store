<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Item;
use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' => Item::factory(),
            'name' => ucfirst(fake()->words(asText: true)),
            'length' => fake()->numberBetween(200, 400),
            'album_id' => Album::factory()
        ];
    }
}
