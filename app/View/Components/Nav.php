<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Nav extends Component {

    public $categories = [];

    public function __construct() {
        $this->categories = Category::whereNull('category_id')
            ->get('name');
    }

    public function render() {
        return view('components.nav');
    }
}
