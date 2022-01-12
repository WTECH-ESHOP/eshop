<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Delivery {
    public function handle(Request $request, Closure $next) {
        $hasDelivery = session()->has('delivery');
        $hasAddress = session()->has('address');

        $isOk = $hasDelivery && $hasAddress;

        return $isOk ? $next($request) : redirect()->back();
    }
}
