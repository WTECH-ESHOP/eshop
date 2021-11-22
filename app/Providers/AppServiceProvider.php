<?php

namespace App\Providers;

use App\View\Components\Nav;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    public function register() {
        //
    }

    public function boot() {
        Blade::component('nav', Nav::class);
    }
}
