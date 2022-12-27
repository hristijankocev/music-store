<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Customer;
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
        });
    }
}
