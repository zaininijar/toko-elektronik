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
        //
    }

    public function store(Request $request)
    {
        $requestData = $request->all();

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
}
