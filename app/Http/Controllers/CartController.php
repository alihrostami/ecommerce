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

        $summary = getCartSummary($userCartItems);
        return view('cart', compact('title', 'userCartItems', 'summary'));
    }

    public function update(Request $request)
    {
        $items = $request->input('qty', []);

        foreach ($items as $item) {
            $productId = (int)$item['product_id'];
            $qty = (int)$item['qty'];

            UserCartManager::update($productId, $qty);
        }

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {

        $cart = session()->get('user_cart', []);

        $cart = array_filter($cart, function($item) use ($id) {
            return $item['product_id'] != $id;
        });


        session()->put('user_cart', $cart);

        return redirect()->route('cart.index');
    }


    public function clear()
    {
        session()->forget('user_cart');
        return redirect()->route('cart.index');
    }
}
