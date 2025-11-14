<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\CheckoutPostRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\UserCartManager;
use DB;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $title = 'آدرس و زمان ارسال';
        $userCartItems = UserCartManager::getItemDetails();

        $summary = getCartSummary($userCartItems);

        return view('checkout.index', compact('title', 'summary','userCartItems'));
    }

    public function store(CheckoutPostRequest $request)
    {
        $data = $request->validated();

        $cartItems = UserCartManager::getItemDetails();

        if (empty($cartItems)) {
            return back()->withErrors(['general' => 'سبد خرید شما خالی است']);
        }

        try {
            DB::beginTransaction();

            $totalPrice = 0;
            $totalProducts = 0;

            foreach ($cartItems as $item) {


                $product = $item['product'];
                $qty = $item['qty'];

                if (!$product) {
                    return back()->withErrors(['general' => 'محصولی یافت نشد']);
                }

                if ($product->qty < $qty) {
                    return back()->withErrors([
                        'general' => "موجودی محصول {$product->name} کافی نیست"
                    ]);
                }
            }


            $order = Order::create([
                'user_id'          => auth()->id(),
                'total_price'      => 0,
                'total_products'   => 0,
                'user_province'    => $data['user_province'],
                'user_city'        => $data['user_city'],
                'user_address'     => $data['user_address'],
                'user_postal_code' => $data['user_postal_code'],
                'user_mobile'      => $data['user_mobile'],
                'description'      => $data['description'] ?? null,
                'status'           => OrderStatus::PENDING
            ]);


            foreach ($cartItems as $item) {


                $product = $item['product'];
                $qty = $item['qty'];
                $price = $product->price;
                $discount = $product->discount ?? 0;

                $total_price_item   = ($price - $discount) * $qty;
                $total_discount_item = $discount * $qty;

                OrderItem::create([
                    'order_id'      => $order->id,
                    'product_id'    => $product->id,
                    'qty'           => $qty,
                    'price'         => $price,
                    'discount'      => $discount,
                    'total_price'   => $total_price_item,
                    'total_discount'=> $total_discount_item,
                ]);

                $totalPrice += $total_price_item;
                $totalProducts += $qty;


                $product->qty -= $qty;
                $product->save();
            }


            $order->update([
                'total_price'    => $totalPrice,
                'total_products' => $totalProducts,
            ]);

            session()->forget('user_cart');

            DB::commit();

            return redirect()->route('account.orders');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['general' => 'خطایی رخ داد: ' . $e->getMessage()]);
        }
    }
}
