<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminOrderController extends Controller
{
    //
    public function index(): Factory|View|Application
    {
        return view('admin.order.index')->with([
            'orders' => OrderDetails::paginate(10)
        ]);
    }

    public function show(Order $order): Factory|View|Application
    {
        return view('admin.order.show')->with([
            'order' => $order
        ]);
    }
}
