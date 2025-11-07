<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $title = 'صفحه اصلی';
        $categories = Category::all();
        $newestProducts = Product::query()
            ->orderByDesc('created_at')
            ->take(6)
            ->get();
        $bestSellingProducts = Product::query()
            ->withCount([
                'orderItems' => function ($query) {
                    $query->wherehas('order', function (Builder $query) {
                        $query->where('status', '=', OrderStatus::DELIVERED);
                    });
                }
            ])
            ->orderByDesc('order_items_count')
            ->take(6)
            ->get();
        return view('index', compact('title', 'categories', 'newestProducts','bestSellingProducts'));
    }
}
