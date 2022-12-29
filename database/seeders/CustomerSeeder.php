<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
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
    }
}
