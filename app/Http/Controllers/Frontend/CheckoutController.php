<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $items = session('cart');

        return view('frontend.checkout.index', [
            'items' => $items,
        ]);
    }
}
