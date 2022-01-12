<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Address;
use App\Models\CartProduct;
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
use Illuminate\Support\Facades\Validator;

class CartController extends Controller {

    public function index() {
        $cart = new Cart();
        $collection = collect($cart->cart);

        $products = $collection->map(function ($value, $key) {
            $keys = json_decode($key);

            $product = Product::with('subcategory.category')->findOrFail($keys[0]);
            $quantity = Quantity::with('variant')->findOrFail($keys[1]);

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
        $address = session()->get('temp_address');

        if (Auth::check()) {
            $id = Auth::id();
            $addresses = User::findOrFail($id)->addresses;

            return view('cart.delivery.index', [
                'addr' => $address,
                'shippings' => $shippings,
                'addresses' => $addresses,
            ]);
        }

        return view('cart.inputs', [
            'addr' => $address,
            'shippings' => $shippings
        ]);
    }

    public function confirmationIndex() {
        $cart = new Cart();
        $delivery = session()->get('delivery');
        $address = session()->get('address');
        $collection = collect($cart->cart);

        $products = $collection->map(function ($value, $key) {
            $keys = json_decode($key);

            $product = Product::with('subcategory.category')->findOrFail($keys[0]);
            $quantity = Quantity::with('variant:id,flavour')->findOrFail($keys[1]);

            $cost = $quantity->price * $value;

            return [
                'product' => $product,
                'quantity' => $quantity,
                'amount' => $value,
                'cost' => $cost,
            ];
        });

        $shipping = Shipping::findOrFail($delivery['shipping']);

        return view('cart.confirmation', [
            'products' => $products,
            'delivery' => $delivery,
            'address' => $address,
            'shipping' => $shipping,
        ]);
    }

    public function doneIndex() {
        return view('cart.done');
    }

    public function store(Request $request) {
        $request->validate(['terms' => 'required']);
        $id = Auth::id();

        $cart = new Cart();
        $delivery = session()->get('delivery');
        $address = session()->get('address');

        $fullAddr = $address['street'] . ' ' . $address['postal_code'] . ', ' . $address['city'] . ' ' . $address['country'];

        DB::beginTransaction();

        try {
            $order = Order::create([
                'shipping_id' => $delivery['shipping'],
                'note' => $request->comment,
                'payment' => strtoupper($delivery['payment']),
                'first_name' => $address['first_name'],
                'last_name' => $address['last_name'],
                'email' => $address['email'],
                'phone_number' => $address['phone_number'],
                'address' => $fullAddr
            ] + (Auth::check() ? ['user_id' => $id] : []));

            foreach ($cart->cart as $key => $value) {
                $keys = json_decode($key);

                $quantity = Quantity::with('variant')->findOrFail($keys[1]);

                OrderProduct::create([
                    'product_id' => $keys[0],
                    'order_id' => $order->id,
                    'amount' => $value,
                    'flavour' => $quantity->variant->flavour,
                    'volume' => $quantity->volume,
                    'price' => $quantity->price,
                ]);
            }

            session()->forget(['cart', 'delivery', 'address', 'temp_address']);
            if (Auth::check())
                CartProduct::where('user_id', $id)->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);

            return redirect()->back()
                ->with('error', 'Cannot create order');
        }

        return redirect()->route('cart.done')
            ->with('success', 'Order successfully created');
    }

    public function storeAddress(Request $request) {
        $save = $request->get('save');
        $id = Auth::id();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'country' => 'required',
            'city' => 'required',
            'street' => 'required',
            'postal_code' => 'required'
        ]);

        if ($validator->fails())
            return redirect()->back()
                ->withInput($request->input())
                ->withErrors($validator->errors()
                    ->merge(['address' => true]));

        $newAddress = $request->except('save') + [
            'user_id' => $id,
        ];

        if ($save) Address::create($newAddress);
        else session()->put('temp_address', $newAddress);

        return redirect()->back()
            ->with('success', 'Address successfully created');
    }

    public function delivery(Request $request) {
        unset($request['_token']);

        if (!Auth::check()) {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'email' => 'required|email',
                'country' => 'required',
                'city' => 'required',
                'street' => 'required',
                'postal_code' => 'required'
            ]);

            $address = $request->except('payment', 'shipping');
        } else if (Auth::check() && session()->has('temp_address'))
            $address = session()->get('temp_address') + ['email' => Auth::user()->email];
        else
            $address = Address::findOrFail($request->address)->toArray() + ['email' => Auth::user()->email];

        $delivery = [
            'shipping' => $request->get('shipping'),
            'payment' => $request->get('payment')
        ];

        session()->put('delivery', $delivery);
        session()->put('address', $address);

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
}
