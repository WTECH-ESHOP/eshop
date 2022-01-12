<?php

namespace App\QueryFilters;

use Closure;

class Order {

    public function handle($request, Closure $next) {
        $builder = $next($request);

        $query = request('o', 'updated_at-desc');
        $params = explode('-', strtolower($query), 2);

        return $builder->orderBy($params[0], $params[1])->with('variant');
    }
}
