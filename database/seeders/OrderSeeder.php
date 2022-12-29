<?php

namespace Database\Seeders;

use App\Models\Customer;
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
        $customer = Customer::first();

        $order = Order::factory()->create(['customer_id' => $customer->id]);
        $order->customer_id = $customer->id;

        $order_total = 0;
        Track::all()->each(function ($track) use ($order, &$order_total) {
            OrderItem::factory()->create([
                'order_id' => $order->id, 'item_id' => $track->item->id])->save();

            $order_total += (int)$track->item->price;
        });
        $order->total = $order_total;
        $order->save();
    }
}
