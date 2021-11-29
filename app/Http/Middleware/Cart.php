<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cart {
    public function handle(Request $request, Closure $next) {
        $cart = session()->get('cart');
        $count = isset($cart) ? count($cart) : 0;

        return $count ? $next($request) : redirect()->back();
    }
}
