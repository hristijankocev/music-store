<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pivots\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store()
    {
        if (Cart::count() === 0) {
            Session::flash('message', 'Cart empty, buy something first !');
            return redirect(route('shop'));
        }

        $customer = Auth::user()->profileable;

        $items = Cart::content();

        $order = Order::factory()->create(['customer_id' => $customer->id]);
        $order->customer_id = $customer->id;
        $order_total = 0;
        foreach ($items as $item) {
            OrderItem::factory()->create([
                'order_id' => $order->id, 'item_id' => $item->id])->save();
            $order_total += (int)$item->price;
        }
        $order->total = $order_total;
        $order->save();

        // Empty the cart
        Cart::destroy();

        Session::flash('message', 'Order completed!');

        return redirect(route('cart'));
    }
}
