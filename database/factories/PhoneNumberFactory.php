<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PhoneNumber>
 */
class PhoneNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'phone_number' => fake()->phoneNumber(),
        ];
    }
}
