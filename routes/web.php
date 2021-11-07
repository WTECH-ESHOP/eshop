<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('home');
})->name('home');

Route::get('/cart', function () {
  return view('cart.home');
})->name('cart-home');

Route::get('/cart-delivery', function () {
  return view('cart.delivery');
})->name('cart-delivery');

Route::get('/cart-inputs', function () {
  return view('cart.inputs');
})->name('cart-inputs');

Route::get('/cart-confirmation', function () {
  return view('cart.confirmation');
})->name('cart-confirmation');

Route::get('/cart-done', function () {
  return view('cart.done');
})->name('cart-done');
