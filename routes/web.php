<?php

Route::get('/', 'Frontend\\HomeController@index')->name('homepage');
Route::get('/product/{product}', 'Frontend\\ProductController@show')->name('product.show');
Route::get('/product/category/{category}', 'Frontend\\ProductController@byCategory')->name('frontend.product.by.category');
Route::get('/cart/checkout', 'Frontend\\CheckoutController@index')->middleware('auth')->name('checkout.index');
Route::get('/cart/{product}', 'Frontend\\CartController@addItem')->middleware('auth')->name('cart.add.item');
Route::get('/cart', 'Frontend\\CartController@index')->middleware('auth')->name('cart.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/login', function () {
    return view('admin.login');
});
