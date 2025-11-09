<?php

namespace App\Services;

use App\Models\Product;

class UserCartManager
{
    public static function getItems()
    {
        return session('user_cart', []);
    }

    public static function getItemDetails(): array
    {
        $cartItems = self::getItems();


        foreach ($cartItems as $productId => $cartItem) {
            $cartItems[$productId]['product'] = Product::find($productId);

        }
        return $cartItems;
    }


    public static function add(int $productId, int $qty): void
    {
        $cartItems = self::getItems();
        $cartItems[$productId] = [
            'qty' => $qty,
            'product_id' => $productId
        ];
        session()->put('user_cart', $cartItems);
    }

    public static function getProductQty(int $productId)
    {
        $cartItems = self::getItems();
        if (!isset($cartItems[$productId]['qty'])) {
            return 0;
        }
        return $cartItems[$productId]['qty'];
    }

    public static function update(int $productId, int $qty): void
    {
        $cartItems = self::getItems();

        if (isset($cartItems[$productId])) {

            if ($qty <= 0) {
                unset($cartItems[$productId]);
            } else {
                $cartItems[$productId]['qty'] = $qty;
            }

            session()->put('user_cart', $cartItems);
        }
    }

}
