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
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();

        // dd($products);

        return view('home', ['products' => $products]);
    }

    public function index($category) {
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

        $maxQuantity = $query->get()
            ->sortByDesc(function ($query) {
                return $query->variant->price;
            })->first();

        $products = app(Pipeline::class)
            ->send($query)
            ->through([
                \App\QueryFilters\Category::class,
                \App\QueryFilters\Price::class,
                \App\QueryFilters\Flavour::class,
                \App\QueryFilters\Volume::class,
                \App\QueryFilters\Brand::class,
                \App\QueryFilters\Order::class
            ])
            ->thenReturn()
            ->paginate(12);


        $flavours = Variant::distinctFlavours();
        $volumes = Quantity::distinctVolumes();
        $brands = Product::distinctBrands();

        return view('products', [
            'products' => $products,
            'category' => $fullCategory,
            'flavours' => $this->convert($flavours),
            'brands' => $this->convert($brands),
            'volumes' => $this->convert($volumes),
            'maxQuantity' => $maxQuantity->variant,
        ]);
    }

    public function show($category, $id) {
        $product = Product::with('variant', 'variants.quantities')->findOrFail($id);

        return view('detail', ['data' => $product]);
    }

    public function search(Request $request) {
        $query = $request->get('query');

        $result = Product::where('name', 'ILIKE', '%' . $query . '%')
            ->with('subcategory.category:id,name', 'variant:product_id,price')
            ->select('id', 'name', 'images', 'subcategory_id')
            ->limit(10)
            ->get();

        return response()->json($result);
    }
}
