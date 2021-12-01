<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//require __DIR__ . '/auth.php';

Route::get('/', 'ProductController@indexHome')
    ->name('home');

Route::get('/search', 'ProductController@search')
    ->name('search');

Route::post('/register', "Auth\RegisteredUserController@store")
    ->middleware('guest')
    ->name('register');

Route::post('/login', "Auth\AuthenticatedSessionController@store")
    ->middleware('guest')
    ->name('login');

Route::post('/logout', "Auth\AuthenticatedSessionController@destroy")
    ->middleware('auth')
    ->name('logout');

Route::get('/cart', "CartController@index")
    ->name('cart');

Route::get('/cart/delivery', "CartController@deliveryIndex")
    ->middleware('cart')
    ->name('cart.delivery');

Route::post('/cart/delivery', "CartController@delivery")
    ->middleware('cart')
    ->name('delivery');

Route::get('/cart/confirmation', "CartController@confirmationIndex")
    ->middleware('delivery')
    ->name('cart.confirmation');

Route::post('/cart/order', "CartController@store")
    ->middleware('delivery')
    ->name('cart.order');

Route::get('/cart/done', "CartController@doneIndex")
    ->name('cart.done');

Route::post('/cart/address', 'CartController@storeAddress')
    ->name('cart.address');

Route::get('/{category}', 'ProductController@index')
    ->name('products');

Route::get('/{category}/{id}', 'ProductController@show')
    ->name('detail');

Route::post('/add-to-cart/{id}', 'CartController@addToCart')
    ->name('addToCart');

Route::delete('/remove-from-cart/{key}', 'CartController@removeFromCart')
    ->name('removeFromCart');

Route::post('/update-in-cart/{key}', 'CartController@changeAmount')
    ->name('updateInCart');
