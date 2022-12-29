<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
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
    }
}
