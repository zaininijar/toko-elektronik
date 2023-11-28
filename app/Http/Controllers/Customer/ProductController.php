<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        return view('customer.product.product', ['products' => $products]);
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        $products = Product::get()->take(4);
        // dd($product);
        return view('customer.product.show', ['product' => $product, 'products' => $products]);
    }
}
