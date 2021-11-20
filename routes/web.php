<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';

Route::get('/', 'ProductController@indexHome')->name('home');

/*Route::get('/address', function () {
    return view('address');
})->name('address-modal');

Route::get('/signup', function () {
    return view('signup');
})->name('signup-modal');*/

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

// Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/{category}', 'ProductController@index')->name('products');
Route::get('/{category}/{id}', 'ProductController@show')->name('detail');
