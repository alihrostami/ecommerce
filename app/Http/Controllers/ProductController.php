<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductListHandler;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(ProductIndexRequest $request)
    {
        $productsQuery = Product::query();

        $productListHandler = new ProductListHandler($request, $productsQuery);
        $productListHandler->applyFilter();
        $productListHandler->applySort();

        $products = $productsQuery
            ->paginate(25);


        $productCount = Product::count();

        $categories = Category::query()
            ->limit(100)
            ->get();

        $title = 'لیست محصولات';
        return view('products.index', compact('title', 'products', 'productCount', 'categories'));

    }

    public function removeFilters(Request $request)
    {
        $queryString = $request->all();
        unset($queryString['category_id']);
        unset($queryString['exists']);
        return redirect()->route('products.index', $queryString);
    }

    public function show(Product $product)
    {
        $title = $product->name;
        $product->load('category');
        return view('products.show',compact('title','product'));
    }
}
