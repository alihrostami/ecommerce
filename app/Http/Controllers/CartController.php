<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Services\UserCartManager;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function add(CartAddRequest $request)
    {
        UserCartManager::add($request->product_id, $request->qty);
        return back();
    }

    public function index()
    {
        $title = 'سبد خرید';
        $userCartItems = UserCartManager::getItemDetails();

        return view('cart', compact('title', 'userCartItems'));
    }
}
