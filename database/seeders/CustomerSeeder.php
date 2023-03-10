<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        // Make a customer we can use to log in
        $dummyUser = User::factory()->create([
            'email' => 'customer@example.com',
            'username' => 'dummy_customer',
            'password' => Hash::make('password')
        ]);
        $dummyUser->save();
        $dummyCustomer = Customer::factory()->create(['user_id' => $dummyUser->id]);
        $dummyUser->profileable()->associate($dummyCustomer)->save();

        for ($i = 0; $i < 2; $i++) {
            PhoneNumber::factory()
                ->create(['customer_id' => $dummyCustomer->id])
                ->save();
        }
    }
}
