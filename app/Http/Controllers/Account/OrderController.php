<?php

namespace App\Http\Controllers\Account;

use App\Enums\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $title = 'سفارش های من';
        $orders = Order::query()
            ->orderByDesc('created_at')
            ->where('user_id', Auth::user()->id)
            ->where('status', '!=', OrderStatus::PENDING)
            ->with('orderItems.product')
            ->paginate(20);
        return view('account.orders', compact('title', 'orders'));
    }
}
