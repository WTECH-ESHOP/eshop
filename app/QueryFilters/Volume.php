<?php

namespace App\QueryFilters;

use Closure;

class Volume {

    public function handle($request, Closure $next) {
        if (!request()->has('v'))
            return $next($request);

        $builder = $next($request);

        $query = strtoupper(request('b'));
        $params = explode(',', $query);


        return $builder->whereIn('brand', $params);
    }
}
