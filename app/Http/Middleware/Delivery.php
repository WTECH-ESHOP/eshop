<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Delivery {
    public function handle(Request $request, Closure $next) {
        $delivery = session()->get('delivery');

        return isset($delivery) ? $next($request) : redirect()->back();
    }
}
