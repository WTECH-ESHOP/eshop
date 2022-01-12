<?php

namespace App\QueryFilters;

use Closure;

class Category {

    public function handle($request, Closure $next) {
        if (!request()->has('c'))
            return $next($request);

        $builder = $next($request);

        $query = str_replace('-', ' ', request('c'));
        $params = explode(',', strtolower($query));

        return $builder->whereHas('subcategory', function ($query) use ($params) {
            $query->whereIn('name', $params);
        });
    }
}
