<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return array
     */
    public function run(): array
    {
        // Create genres
        $genrePop = Genre::factory()->create(['name' => 'pop']);
        $genreDisco = Genre::factory()->create(['name' => 'disco']);
        $genreFunk = Genre::factory()->create(['name' => 'funk']);

        return [$genrePop, $genreDisco, $genreFunk];
    }
}
