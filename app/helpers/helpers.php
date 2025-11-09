<?php

use App\Models\Product;

if (!function_exists('getUserFullName')) {
    function getUserFullName(): string
    {
        $user = Auth::user();
        return $user->first_name . ' ' . $user->last_name;
    }
}
if (!function_exists('activeAccountSidemenuItem')) {
    function activeAccountSidemenuItem(string $targetRoute): string
    {
        $activeClass = 'bg-blue-500/10 text-blue-500';
        $defaultClass = 'hover:text-blue-500';
        $currentRoute = Route::currentRouteName();

        if ($currentRoute == $targetRoute) {
            return $activeClass;
        }
        return $defaultClass;
    }
}
if (!function_exists('getFullProductName')) {
    function getFullProductName(Product $product): string
    {
        return $product->name . ' | ' . $product->name_en;
    }
}
if (!function_exists('getProductDiscountPercent')) {
    function getProductDiscountPercent(Product $product): int
    {
        return (int)(($product->discount * 100) / $product->price);
    }
}
if (!function_exists('activeSortClass')) {
    function activeSortClass(string $current): string
    {
        if (!request()->filled('sort') && $current == 'newest') {
            return "text-blue-500";
        }
        $sortQuery = request()->input('sort');
        if ($sortQuery == $current) {
            return "text-blue-500";
        }
        return "text-gray-400";
    }
}

if (!function_exists('getProductsCount')) {
    function getProductsCount(): int
    {
        return count(\App\Services\UserCartManager::getItems());

    }
}
if (!function_exists('getCartSummary')) {

    function getCartSummary($userCartItems)
    {
        $totalPrice = 0;
        $totalDiscount = 0;

        foreach ($userCartItems as $item) {
            $qty = $item['qty'];
            $price = $item['product']->price * $qty;
            $discount = $item['product']->discount * $qty;

            $totalPrice += $price;
            $totalDiscount += $discount;
        }

        $finalPrice = $totalPrice - $totalDiscount;

        return [
            'totalPrice' => $totalPrice,
            'totalDiscount' => $totalDiscount,
            'finalPrice' => $finalPrice,
        ];
    }
}
