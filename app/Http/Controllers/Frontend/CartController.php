<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // session()->forget('cart');
        $items = session('cart');
        return view('frontend.cart.index', [
            'items' => $items
        ]);
    }

    public function addItem(Product $product)
    {
        $item = [
            'product_id' => $product->id,
            'image' => $product->getImage(),
            'slug' => $product->slug,
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'formatted_price' => $product->getPrice(),
            'qty' => 1
        ];
        if (session()->has('cart')) {
            session()->push('cart', $item);
            return redirect()->route('cart.index');
        }
        session()->put('cart', [$item]);
        return redirect()->route('cart.index');
    }
}
