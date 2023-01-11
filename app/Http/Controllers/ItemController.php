<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Gloudemans\Shoppingcart\Facades\Cart;

class ItemController extends Controller
{
    public function addToCart(Item $item)
    {
        Cart::add($item->id, $item->itemable->name, 1, $item->price);

        return redirect(route('cart'));
    }
}
