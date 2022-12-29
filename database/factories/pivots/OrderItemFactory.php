<?php

namespace Database\Factories\pivots;

use App\Models\Item;
use App\Models\Order;
use App\Models\Pivots\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'item_id' => Item::factory()
        ];
    }
}
