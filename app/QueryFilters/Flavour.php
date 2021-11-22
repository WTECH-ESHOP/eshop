<?php

namespace App\QueryFilters;

use Closure;

class Flavour {

    public function handle($request, Closure $next) {
        if (!request()->has('f'))
            return $next($request);

        $builder = $next($request);

        $query = request('f');
        $params = explode(',', strtoupper($query));

        return $builder->whereHas('variants', function ($query) use ($params) {
            $query->whereIn('flavour', $params);
        });
    }
}
