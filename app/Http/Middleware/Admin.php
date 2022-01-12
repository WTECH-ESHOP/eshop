<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin {

    public function handle($request, Closure $next) {
        if (Auth::check()) {
            if (Auth::user()->isUser())
                return redirect(route('home'));

            if (Auth::user()->isAdmin())
                return $next($request);
        }

        return redirect(route('admin.login.index'));
    }
}
