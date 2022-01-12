<?php

namespace App\QueryFilters;

use Closure;

class Brand {

    public function handle($request, Closure $next) {
        if (!request()->has('b'))
            return $next($request);

        $builder = $next($request);

        $query = strtoupper(request('b'));
        $params = explode(',', $query);


        return $builder->whereIn('brand', $params);
    }
}
