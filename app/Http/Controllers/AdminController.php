<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index() {
        $products = Product::with('subcategory.category')
            ->orderByDesc('updated_at')
            ->paginate(12);

        return view('admin.index', [
            'products' => $products
        ]);
    }

    public function show($id = null) {
        $product = Product::with('subcategory.category', 'variants.quantities')
            ->find($id);

        $categories = Category::with('subcategories')
            ->whereNull('category_id')
            ->get();

        $brands = Product::distinctBrands();

        return view('admin.show', [
            'data' => $product,
            'brands' => $this->convert($brands),
            'categories' => $categories
        ]);
    }

    public function store(Request $request, $id = null) {
        $request->validate([
            'name' => 'required|string',
            'subcategory' => 'required|integer',
            'description' => 'required|string',
            'images' => '', // TODO
            'unit' => 'required|string',
            'brand' => 'required|string',
            'information' => 'required|string',
        ]);

        // TODO: variants

        Product::updateOrCreate(['id' => $id], [
            'name' => $request->input('name'),
            'subcategory_id' => $request->input('subcategory'),
            'description' => $request->input('description'),
            // TODO
            'images' => $request->input('defauult_images', ['https://via.placeholder.com/640x480.png/0011cc?text=omnis']),
            'unit' => $request->input('unit'),
            'brand' => $request->input('brand'),
            'information' => $request->input('information'),
        ]);

        return redirect()->route('admin')
            ->with('success', 'Product successfully saved');
    }

    public function destroy($id) {
        Product::findOrFail($id)->delete();

        return redirect()->back()
            ->with('success', 'Product successfully removed');
    }
}
