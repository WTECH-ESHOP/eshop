<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shipping;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderProduct;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart');
        $price = 0;
        $collection = collect($cart);

        $products = $collection->map(function($value, $key) use ($price) {
            // dd(json_decode($key));
            $keys = json_decode($key);
            $product = Product::with('subcategory.category')->findOrFail($keys[0]);
            $productPrice = floatval($value['price']) * $value['quantity'];
            $price += $productPrice;
            return array_merge([
                'product' => $product, 
                'cost' => $productPrice,
            ], $value);
        });

        return view('cart.home', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        //
    }

    // $table->id();
    // $table->foreignId('product_id')->constrained('products')->nullOnDelete();
    // $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
    // $table->unsignedInteger('amount')->default(1);
    // // flavour enum
    // $table->unsignedInteger('volume');
    // $table->unsignedDouble('price');
    // $table->timestamps();
    public function store(Request $request) {
        $cart = session()->get('cart');
        $delivery = session()->get('delivery');

        DB::transaction(function() use($request, $delivery, $cart) {
            $address = $delivery['address'] . ' ' . $delivery['postal_code'] . ', ' . $delivery['city'] ;

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

            foreach($cart as $key => $value) {
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
        });

        return redirect()->route('cart.done');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    public function deliveryIndex() {
        $shippings = Shipping::all(); 

        if(Auth::check()) return view('cart.delivery', ['shippings' => $shippings]);
        else return view('cart.inputs', ['shippings' => $shippings]);
    }
    
    //middleware
    public function confirmationIndex() {
        $cart = session()->get('cart');
        $delivery = session()->get('delivery');
        $collection = collect($cart);

        $products = $collection->map(function($value, $key) {
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

    public function delivery(Request $request) {
        $delivery = $request->input();
        unset($delivery['_token']);

        session()->put('delivery', $delivery);

        return redirect()->route('cart.confirmation');
    }

    public function removeFromCart($key) {
        $cart = session()->get('cart');
        unset($cart[$key]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}
