<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', 'ProductController@indexHome')->name('home');

Route::get('/address', function () {
  return view('address');
})->name('address-modal');

Route::get('/signup', function () {
  return view('signup');
})->name('signup-modal');

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

Route::get('/detail', function () {
  return view('detail');
})->name('detail');

Route::get('/products', function () {
  return view('products');
})->name('products');

// Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/{category}', 'ProductController@index');
Route::get('/{category}/{id}', 'ProductController@show');
