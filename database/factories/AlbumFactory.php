<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_name' => ucfirst(fake()->words(asText: true)),
            'release_date' => fake()->dateTimeBetween('-60 years'),
            'id' => Item::factory()
        ];
    }
}
