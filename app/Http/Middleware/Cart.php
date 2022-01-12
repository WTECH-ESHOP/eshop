<?php

namespace App\Http\Middleware;

use App\Helpers\Cart as HelpersCart;
use Closure;
use Illuminate\Http\Request;

class Cart {
    public function handle(Request $request, Closure $next) {
        $cart = new HelpersCart();

        $isEmpty = empty($cart->cart);

        return !$isEmpty ? $next($request) : redirect()->back();
    }
}
