<?php

namespace App\Helpers;

use App\Models\CartProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Cart {

    public $cart = [];

    function __construct() {
        if (Auth::check()) {
            $id = Auth::id();
            $products = User::find($id)->cartProducts;
            $products->each(function ($item) {
                $key = json_encode([$item->product_id, $item->quantity_id]);
                $this->cart[$key] = $item->amount;
            });
        } else {
            $this->cart = session()->get('cart', []);
        }
    }

    static function sessionToDatabase() {
        $id = Auth::id();
        $products = session()->get('cart');

        if (!empty($products))
            foreach ($products as $key => $amount) {
                $keys = json_decode($key);
                $product = CartProduct::firstOrCreate([
                    'user_id' => $id,
                    'quantity_id' => $keys[1],
                ], [
                    'product_id' => $keys[0],
                ])->increment('amount', $amount - 1);
            }
    }

    function add($product_id, $quantity_id, $amount = 1) {
        $user_id = Auth::id();
        $key = json_encode([$product_id, $quantity_id]);

        // cart is empty
        if (empty($this->cart)) {
            if (Auth::check())
                CartProduct::create([
                    'user_id' => $user_id,
                    'product_id' => $product_id,
                    'quantity_id' => $quantity_id,
                    'amount' => $amount
                ]);

            $this->cart = [$key => $amount];
            session()->put('cart', $this->cart);

            return $this->cart[$key];
        }

        // item is in cart
        if (isset($this->cart[$key])) {
            if (Auth::check())
                CartProduct::where('user_id', $user_id)
                    ->where('quantity_id', $quantity_id)
                    ->increment('amount', $amount);

            $this->cart[$key] += $amount;
            session()->put('cart', $this->cart);

            return $this->cart[$key];
        }

        // item is not in cart
        if (Auth::check())
            CartProduct::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity_id' => $quantity_id,
                'amount' => $amount
            ]);

        $this->cart[$key] = $amount;
        session()->put('cart', $this->cart);

        return $this->cart[$key];
    }

    function remove($key) {
        $user_id = Auth::id();
        $keys = json_decode($key);

        if (Auth::check())
            CartProduct::where('user_id', $user_id)
                ->where('quantity_id', $keys[1])
                ->delete();

        unset($this->cart[$key]);
        session()->put('cart', $this->cart);
    }

    function change($key, $amount = 1) {
        $user_id = Auth::id();
        $keys = json_decode($key);

        if (Auth::check()) {
            $product = CartProduct::where('user_id', $user_id)
                ->where('quantity_id', $keys[1]);

            $newAmount = $product->get()[0]->amount + $amount;

            if ($newAmount < 1) $product->delete();
            else $product->increment('amount', $amount);
        }

        $this->cart[$key] += $amount;
        if ($this->cart[$key] < 1)
            unset($this->cart[$key]);

        session()->put('cart', $this->cart);
    }
}
