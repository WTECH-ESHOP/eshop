<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icons extends Component {

    public $count = 0;
    public $price = 0;

    public function __construct() {
        $items = session()->get('cart');

        if ($items)
            foreach ($items as $value) {
                $this->count += $value['quantity'];
                $this->price += floatval($value['price']) * $value['quantity'];
            }
    }

    public function render() {
        return view('components.ui.icons');
    }
}
