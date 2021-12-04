<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', 'ProductController@indexHome')
    ->name('home');

Route::get('/search', 'ProductController@search')
    ->name('search');

// Auth
Route::post('/register', "Auth\AuthController@create")
    ->middleware('guest')
    ->name('register');

Route::post('/login', "Auth\AuthController@store")
    ->middleware('guest')
    ->name('login');

Route::post('/logout', "Auth\AuthController@destroy")
    ->middleware('auth')
    ->name('logout');

// Admin
Route::prefix('admin')
    ->name('admin')
    ->group(function () {
        Route::get('/login', 'Auth\AdminAuthController@index')
            ->name('.login.index');

        Route::post('/login', 'Auth\AdminAuthController@store')
            ->name('.login');

        Route::post('/logout', "Auth\AdminAuthController@destroy")
            ->middleware('admin')
            ->name('.logout');

        Route::get('', 'AdminController@index')
            ->middleware('admin');

        Route::prefix('product')
            ->middleware('admin')
            ->name('.product')
            ->group(function () {
                Route::get('/{id?}', 'AdminController@show')
                    ->name('.show');

                Route::post('/{id?}', 'AdminController@store')
                    ->name('.store');

                Route::delete('/{id}', 'AdminController@destroy')
                    ->name('.destroy');
            });
    });

// Cart
Route::post('/cart/delivery', "CartController@delivery")
    ->middleware('cart')
    ->name('delivery');

Route::post('/cart/order', "CartController@store")
    ->middleware('delivery')
    ->name('cart.order');

Route::prefix('cart')
    ->middleware('auth')
    ->name('cart')
    ->group(function () {
        Route::get('', "CartController@index");

        Route::get('/delivery', "CartController@deliveryIndex")
            ->middleware('cart')
            ->name('.delivery');

        Route::get('/confirmation', "CartController@confirmationIndex")
            ->middleware('delivery')
            ->name('.confirmation');

        Route::get('/done', "CartController@doneIndex")
            ->name('.done');

        Route::post('/address', 'CartController@storeAddress')
            ->name('.address');
    });

// Cart
Route::post('/add-to-cart/{id}', 'CartController@addToCart')
    ->name('addToCart');

Route::delete('/remove-from-cart/{key}', 'CartController@removeFromCart')
    ->name('removeFromCart');

Route::post('/update-in-cart/{key}', 'CartController@changeAmount')
    ->name('updateInCart');

// Products
Route::get('/{category}', 'ProductController@index')
    ->name('products');

Route::get('/{category}/{id}', 'ProductController@show')
    ->name('detail');
