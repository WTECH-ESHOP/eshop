<?php

namespace App\QueryFilters;

use Closure;

class Price {

    public function handle($request, Closure $next) {
        if (!request()->has('p'))
            return $next($request);

        $builder = $next($request);

        $query = request('p');
        $params = explode('-', $query);

        return $builder->whereHas('variants.quantities', function ($query) use ($params) {
            $query->where([
                ['price', '>=', $params[0]],
                ['price', '<=', $params[1]],
            ]);
        });
    }
}
