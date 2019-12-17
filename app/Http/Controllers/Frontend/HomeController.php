<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('olshop.front_pagination'));
        // $categories = Category::get();
        // $categories->load('products');

        return view('homepage', [
            // 'categories' => $categories,
            'products' => $products,
        ]);
    }
}
