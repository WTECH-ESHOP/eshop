<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function indexHome()
  {
    $products = Product::with('subcategory.category')->limit(8)->orderBy('updated_at')->get();
    return view('home', ['products' => $products]);
  }
}
