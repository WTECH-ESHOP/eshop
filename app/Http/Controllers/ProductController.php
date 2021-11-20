<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {

    public function indexHome() {
        $products = Product::with('subcategory.category')->limit(8)->orderBy('updated_at', 'desc')->get();
        return view('home', ['products' => $products]);
    }

    public function index(Request $request, $category) {
        $categoryName = str_replace('-', ' ', $category);
        $fullCategory = Category::with('subcategories')->where('name', $categoryName)->whereNull('category_id')->firstOrFail();

        $orderBy = explode('-', $request->query('order', 'updated_at-desc'), 2);
        $products = Product::whereHas('subcategory.category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->orderBy($orderBy[0], $orderBy[1])->paginate(12);

        return view('products', [
            'products' => $products,
            'category' => $fullCategory
        ]);
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
