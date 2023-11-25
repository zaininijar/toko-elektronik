<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();
        // notify()->success("Success notification test", "Success", "topRight");
        return view('admin.products', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'picture_path' => 'required|image|mimes:png,jpg,svg,jpeg|max:5000',
            'spesification' => 'required',
            'description' => 'required'
        ]);

        try {

            $picturePath = $request->file('picture_path')->store('public/images/products');
            $picturePath = substr($picturePath, strlen('public/'));

            if (!$picturePath) {
                return redirect()->back()->with('error', 'File upload failed.');
            }

            $requestData = $request->all();
            $requestData['picture_path'] = $picturePath;
            $requestData['product_category_id'] = 1;

            Product::create($requestData);

            return redirect()->route('product.index')->with('success', 'Product successfully created');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        try {

            if ($request->hasFile('picture_path')) {
                $picturePath = $request->file('picture_path')->store('public/images/products');
                $picturePath = substr($picturePath, strlen('public/'));
                $product->picture_path = $picturePath;
            }

            if (!isset($picturePath)) {
                return redirect()->back()->with('error', 'File upload failed.');
            }

            $requestData = $request->all();

            $product->name = $requestData['name'];
            $product->price = $requestData['price'];
            $product->quantity = $requestData['quantity'];
            $product->spesification = $requestData['spesification'];
            $product->description = $requestData['description'];

            $product->save();

            return redirect()->route('product.index')->with('success', 'Product successfully updated');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);

            if (!$product) {
                return response()->json("Undefined product", 409);
            }

            $product->delete();


        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
        return response()->json("Success delete product !!", 200);
    }
}
