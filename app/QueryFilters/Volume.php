<?php

namespace App\QueryFilters;

use Closure;

class Volume {

    public function handle($request, Closure $next) {
        if (!request()->has('v'))
            return $next($request);

        $builder = $next($request);

        $query = request('v');
        $params = explode(',', $query);

        // return $builder->whereIn('brand', $params);

        return $builder->whereHas('variants.quantities', function ($query) use ($params) {
            $query->whereIn('volume', $params);
        });
    }
}
