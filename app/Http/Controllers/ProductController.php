<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Quantity;
use Illuminate\Pipeline\Pipeline;

class ProductController extends Controller {

    public function indexHome() {
        $products = Product::with('subcategory.category', 'variant')
            ->orderBy('updated_at', 'desc')
            ->limit(8)
            ->get();

        return view('home', ['products' => $products]);
    }

    public function index(Request $request, $category) {
        $categoryName = str_replace('-', ' ', $category);
        $fullCategory = Category::with('subcategories')
            ->where('name', $categoryName)
            ->whereNull('category_id')
            ->firstOrFail();

        $query = Product::whereHas(
            'subcategory.category',
            function ($query) use ($categoryName) {
                $query->where('name', $categoryName);
            }
        )->with('variant');

        $products = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Flavour::class,
                \App\QueryFilters\Volume::class,
                \App\QueryFilters\Brand::class,
                \App\QueryFilters\Order::class
            ])
            ->thenReturn()
            ->paginate(12);

        $flavours = Variant::distinct('flavour')
            ->select('flavour')
            ->get()
            ->toArray();

        $volumes = Quantity::distinct('volume')
            ->select('volume')
            ->get()
            ->toArray();

        $brands = Product::distinct('brand')
            ->select('brand')
            ->get()
            ->toArray();

        return view('products', [
            'products' => $products,
            'category' => $fullCategory,
            'flavours' => array_merge(...array_map(fn ($item) => array_values($item), $flavours)),
            'brands' => array_merge(...array_map(fn ($item) => array_values($item), $brands)),
            'volumes' => array_merge(...array_map(fn ($item) => array_values($item), $volumes)),
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
