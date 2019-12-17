<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        // $categories = Category::get();
        // $product = Product::where('slug',$slug)->first();

        return view('frontend.product.show', [
            //'categories' => $categories,
            'product' => $product
        ]);
    }

    public function byCategory(Category $category)
    {
        // $categories = Category::get();
        // $categories->load('products');
        $products = $category->products()->paginate(config('olshop.front_pagination'));

        return view('frontend.product.by-category', [
            //'categories' => $categories,
            'products' => $products,
        ]);
    }
}
