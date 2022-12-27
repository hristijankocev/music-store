<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
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
            'track_name' => ucfirst(fake()->words(asText: true)),
            'track_length' => fake()->numberBetween(200, 400),
            'album_id' => Album::factory()
        ];
    }
}
