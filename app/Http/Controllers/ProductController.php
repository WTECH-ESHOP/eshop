<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {

    public function indexHome() {
        $products = Product::with('subcategory.category')->limit(8)->orderBy('updated_at')->get();
        return view('home', ['products' => $products]);
    }

    public function index($category) {
        Category::where('name', $category)->whereNull('category_id')->firstOrFail();
        $products = Product::whereHas('subcategory.category', function($query) use ($category) {
            $query->where('name', $category);
          })->paginate(3);

        return view('products', ['products' => $products]);
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($category, $id) {
        $product = Product::findOrFail($id);

        return view('detail', ['data' => $product]);
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
