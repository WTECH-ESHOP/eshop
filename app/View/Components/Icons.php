<?php

namespace App\View\Components;

use App\Helpers\Cart;
use App\Models\Quantity;
use Illuminate\View\Component;

class Icons extends Component {

    public $count = 0;
    public $price = 0;

    public function __construct() {
        $cart = new Cart();

        if (!empty($cart->cart))
            foreach ($cart->cart as $key => $value) {
                $keys = json_decode($key);
                $quantity = Quantity::findOrFail($keys[1]);

                $this->count += $value;
                $this->price += $quantity->price * $value;
            }
    }

    public function render() {
        return view('components.ui.icons');
    }
}
