<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Album;
use App\Models\Customer;
use App\Models\Genre;
use App\Models\Item;
use App\Models\PhoneNumber;
use App\Models\Track;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Polymorphic relationships = headache */

        // Add an admin
        $user = User::factory([
            'name' => 'Hristijan Kocev',
            'username' => 'root',
            'password' => Hash::make('admin'),
            'email' => 'root@example.com'
        ])->create();
        $user->save();

        $admin = Admin::factory()->create(['user_id' => $user->id]);

        $user->profileable()->associate($admin)->save();

        // Create customers
        User::factory(5)->make()->each(function ($u) {
            $u->save();
            $c = Customer::factory()->create(['user_id' => $u->id]);
            $u->profileable()->associate($c)->save();

            // Create phone numbers for the customers
            for ($i = 0; $i < 2; $i++) {
                PhoneNumber::factory()
                    ->create(['customer_id' => $c->id])
                    ->save();
            }
        });

        // Create genres
        Genre::factory()->create(['name' => 'pop']);
        Genre::factory()->create(['name' => 'funk']);
        Genre::factory()->create(['name' => 'disco']);

        // Make tracks (singles)
        Item::factory(5)->make()->each(function ($item) {
            $item->save();
            Track::factory()->create(['id' => $item->id, 'album_id' => null]);
        });

        // Make tracks which are a part of an album
        $album = Album::factory()->create(['album_name' => 'Matahari']);
        $album->save();

        Item::factory(5)->make()->each(function ($item) use ($album) {
            $item->save();
            Track::factory()->create(['id' => $item->id, 'album_id' => $album->id]);
        });
    }
}
