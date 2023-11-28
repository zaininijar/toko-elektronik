<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $user_id = Auth::user()->id;
        if (!$user_id) {
            return redirect()->back();
        }

        $requestData = $request->all();
        $shippingCost = 12500;

        try {
            // get total amount
            $subtotal_amount = 0;
            foreach($requestData['products'] as $product) {
                $productPrice = Product::find($product['id'])->price;
                $subtotal_amount += $productPrice * $product['qty'];
            }

            // payment information
            $total_amount = $subtotal_amount + $shippingCost;
            $payment = Payment::create([
                'payment_type' => $requestData['payment_type'],
                'account_name' => $requestData['account_name'],
                'account_number' => $requestData['account_number'],
                'total_amount' => $total_amount
            ]);

            //create order

            $order = Order::create([
                'user_id' => $user_id,
                'payment_id' => $payment->id,
                'recipient_name' => $requestData['recipient_name'],
                'phone_number' => $requestData['phone_number'],
                'shipped_address' => $requestData['shipped_address'],
                'shipped_cost' => $shippingCost
            ]);

            // create order product
            foreach($requestData['products'] as $product) {
                OrderProduct::create([
                    'product_id' => $product['id'],
                    'order_id' => $order->id,
                    'qty' => $product['id'],
                    'subtotal_amount' => $subtotal_amount
                ]);
            }

            return redirect()->back()->with("Success");

        } catch (\Throwable $th) {
            dd($th->getMessage());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
