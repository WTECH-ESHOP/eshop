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

Route::post('/register', "Auth\RegisteredUserController@store")
    ->middleware('guest')
    ->name('register');

Route::post('/login', "Auth\AuthenticatedSessionController@store")
    ->middleware('guest')
    ->name('login');

Route::post('/logout', "Auth\AuthenticatedSessionController@destroy")
    ->middleware('auth')
    ->name('logout');

Route::get('/cart', function () {
    return view('cart.home');
})->name('cart-home');

Route::get('/cart/delivery', function () {
    return view('cart.delivery');
})->name('cart-delivery');

Route::get('/cart/inputs', function () {
    return view('cart.inputs');
})->name('cart-inputs');

Route::get('/cart/confirmation', function () {
    return view('cart.confirmation');
})->name('cart-confirmation');

Route::get('/cart/done', function () {
    return view('cart.done');
})->name('cart-done');

Route::get('/{category}', 'ProductController@index')
    ->name('products');

Route::get('/{category}/{id}', 'ProductController@show')
    ->name('detail');
