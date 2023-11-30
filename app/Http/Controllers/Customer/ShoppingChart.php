<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\ShoppingChart as ModelsShoppingChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingChart extends Controller
{
    public function index()
    {
        $shopping_chart = ModelsShoppingChart::where('user_id', Auth::user()->id)->with('product');
        $subtotal = 0;
        $shipping_cost = 12500;

        foreach ($shopping_chart->get() as $shop) {
            $subtotal += $shop->qty * $shop->product->price;
        }

        $amount_default = array('subtotal' => $subtotal, 'shipping_cost' => $shipping_cost, 'total' => $shipping_cost + $subtotal);

        return view('customer.shopping-chart', ['shopping_charts' => $shopping_chart->get(), 'amount_default' => $amount_default]);
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

        $existingChartItem = ModelsShoppingChart::where('user_id', Auth::user()->id)
        ->where('product_id', $requestData['id'])
        ->first();

        if ($existingChartItem) {
            return response()->json("Product is already in the shopping chart.", 400);
        }

        try {
            ModelsShoppingChart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $requestData['id'],
                'qty' => $requestData['qty']
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }

        return response()->json("Success add to chart !!", 200);

    }

    public function destroy($id)
    {
        try {
            $shopping_chart = ModelsShoppingChart::find($id);

            if (!$shopping_chart) {
                return response()->json("Undefined shopping_chart", 409);
            }

            $shopping_chart->delete();


        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
        return response()->json("Success delete shopping_chart !!", 200);
    }
}
