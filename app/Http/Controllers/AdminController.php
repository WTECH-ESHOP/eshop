<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Quantity;
use App\Models\TemporaryFile;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

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
            'images' => 'required',
            'unit' => 'required|string',
            'brand' => 'required|string',
            'information' => 'required|string',
        ]);

        $product = Product::updateOrCreate(['id' => $id], [
            'name' => $request->input('name'),
            'subcategory_id' => $request->input('subcategory'),
            'description' => $request->input('description'),
            'images' => '',
            'unit' => $request->input('unit'),
            'brand' => $request->input('brand'),
            'information' => $request->input('information'),
        ]);
        
        $variant = Variant::create([
            'flavour' => 'CHOCOLATE',
            'product_id' => $product->id,
        ]);

        Quantity::create([
            'volume' => 1000,
            'price' => 19.99,
            'amount' => 1,
            'variant_id' => $variant->id
        ]);

        $imageFoldersInStorage = $request->input('images');
        $imageNameArray = [];
        foreach($imageFoldersInStorage as $imageFolder) {
            $tempFile = TemporaryFile::where('folder', $imageFolder)->first();

            if($tempFile) {
                $filename = $tempFile->filename;
                $productsPath = 'assets/images/products/';
                $productFullPath = public_path($productsPath.$product->id);
                $tempPath = 'app/upload/tmp/';

                if(!file_exists($productFullPath)) mkdir($productFullPath);
                File::move(storage_path($tempPath.$imageFolder.'/'.$filename), public_path($productsPath.$product->id.'/'.$filename));

                $fullPathToImg = URL::to('/') . '/' . $productsPath . $product->id . '/' . $filename;
                $fullPathToImg = str_replace('\\', '/', $fullPathToImg);
                array_push($imageNameArray, $fullPathToImg);

                rmdir(storage_path($tempPath.$imageFolder));
                $tempFile->delete();
            }
        }

        $product->images = $imageNameArray;
        $product->save();

        return redirect()->route('admin')
            ->with('success', 'Product successfully saved');
    }

    public function destroy($id) {
        Product::findOrFail($id)->delete();

        $productsPath = 'assets/images/products/';
        $productPath = public_path($productsPath . $id);
        File::deleteDirectory($productPath);

        return redirect()->back()
            ->with('success', 'Product successfully removed');
    }

    public function upload(Request $request) {
        if($request->hasFile('images')) {
            $file = $request->file('images');
            $suffix = $file->getClientOriginalExtension();
            $filename = uniqid() . '-' . now()->timestamp . '.' . $suffix;
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('upload/tmp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        }

        return '';
    }

    public function revert(Request $request) {
        return $request->getContent();
    }
}
