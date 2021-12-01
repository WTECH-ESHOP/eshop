<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Address;
use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Quantity;
use App\Models\User;
use App\Models\Variant;

class CartController extends Controller {

    public function index() {
        $cart = new Cart();
        $collection = collect($cart->cart);

        $products = $collection->map(function ($value, $key) {
            $keys = json_decode($key);

            $product = Product::with('subcategory.category')->findOrFail($keys[0]);
            $quantity = Quantity::findOrFail($keys[1]);

            $cost = $quantity->price * $value;

            return [
                'product' => $product,
                'quantity' => $quantity,
                'amount' => $value,
                'cost' => $cost,
            ];
        });

        return view('cart.home', ['products' => $products]);
    }

    public function deliveryIndex() {
        $shippings = Shipping::all();

        if (Auth::check()) {
            $id = Auth::id();
            $addresses = User::findOrFail($id)->addresses;

            return view('cart.delivery', [
                'shippings' => $shippings,
                'addresses' => $addresses,
            ]);
        }

        return view('cart.inputs', ['shippings' => $shippings]);
    }

    public function confirmationIndex() {
        $cart = session()->get('cart');
        $delivery = session()->get('delivery');
        $collection = collect($cart);

        $products = $collection->map(function ($value, $key) {
            $keys = json_decode($key);
            $product = Product::with('subcategory.category')->findOrFail($keys[0]);
            $productPrice = floatval($value['price']) * $value['quantity'];

            return array_merge([
                'product' => $product,
                'cost' => $productPrice,
            ], $value);
        });

        $shipping = Shipping::findOrFail($delivery['shipping']);

        return view('cart.confirmation', [
            'products' => $products,
            'delivery' => $delivery,
            'shipping' => $shipping,
        ]);
    }

    public function doneIndex() {
        return view('cart.done');
    }

    public function store(Request $request) {
        $cart = session()->get('cart');
        $delivery = session()->get('delivery');
        $address = $delivery['address'] . ' ' . $delivery['postal_code'] . ', ' . $delivery['city'];

        DB::beginTransaction();

        try {
            $order = Order::create([
                'shipping_id' => $delivery['shipping'],
                'note' => $request->comment,
                'payment' => strtoupper($delivery['payment']),
                'first_name' => $delivery['first_name'],
                'last_name' => $delivery['last_name'],
                'email' => $delivery['email'],
                'phone_number' => $delivery['phone'],
                'address' => $address
            ]);

            foreach ($cart as $key => $value) {
                $keys = json_decode($key);

                OrderProduct::create([
                    'product_id' => $keys[0],
                    'order_id' => $order->id,
                    'amount' => $value['quantity'],
                    'flavour' => $value['flavour'],
                    'volume' => $value['volume'],
                    'price' => $value['price'],
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Cannot create order');
        }

        session()->forget(['cart', 'delivery']);

        return redirect()->route('cart.done')
            ->with('success', 'Order successfully created');
    }

    public function storeAddress(Request $request) {
        dd($request->all());
    }

    public function delivery(Request $request) {
        $delivery = $request->input();
        unset($delivery['_token']);

        session()->put('delivery', $delivery);

        return redirect()->route('cart.confirmation')
            ->with('success', 'Delivery successfully created');
    }

    public function addToCart(Request $request, $id) {
        $product = Product::findOrFail($id);
        $variant = Variant::findOrFail($request->flavour);
        $quantity = Quantity::findOrFail($request->volume);

        $cart = new Cart();
        $cart->add($product->id, $quantity->id, intval($request->quantity));

        return redirect()->back()
            ->with('success', 'Product successfully added to cart');
    }

    public function removeFromCart($key) {
        $cart = new Cart();
        $cart->remove($key);

        return redirect()->back()
            ->with('success', 'Product successfully removed from cart');
    }

    public function changeAmount(Request $request, $key) {
        $amount = request()->get('amount');

        $cart = new Cart();
        $cart->change($key, $amount);

        return redirect()->back()
            ->with('success', 'Product amount successfully changed');
    }

    public function create() {
        //
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
