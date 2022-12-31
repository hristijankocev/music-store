<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Artist::factory()->create(['name' => 'L\'imperatrice']);
        Artist::factory()->create(['name' => 'Rejjie Snow']);
    }
}
