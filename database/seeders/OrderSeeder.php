<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Item;
use App\Models\Order;
use App\Models\Pivots\OrderItem;
use App\Models\Track;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        // Create orders
        for ($i = 0; $i < 20; $i++) {
            $customer = Customer::inRandomOrder()->limit(1)->get()[0];

            $order = Order::factory()->create(['customer_id' => $customer->id]);
            $order->customer_id = $customer->id;
            $order_total = 0;
            Item::inRandomOrder()->limit(5)->get()->each(function ($item) use ($order, &$order_total) {
                OrderItem::factory()->create([
                    'order_id' => $order->id, 'item_id' => $item->id])->save();

                $order_total += (int)$item->price;
            });
            $order->total = $order_total;
            $order->created_at = fake()->dateTimeBetween(startDate: '-10 year', endDate: '-6 months');
            $order->updated_at = $order->created_at;
            $order->save();
        }
    }
}
