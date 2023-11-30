<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        // notify()->success("Success notification test", "Success", "topRight");
        return view('admin.orders', [
            'orders' => $orders
        ]);

        return view('admin.orders');
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
        //
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
    public function update(Request $request, Order $order)
    {
        $statuses = ['REJECT', 'PROCCESS', 'SHIPPING', 'SUCCESS'];
        $currentStatusIndex = array_search($order->status, $statuses);

        if ($currentStatusIndex !== false) {

            $nextStatusIndex = ($currentStatusIndex + 1) % count($statuses);
            $nextStatus = $statuses[$nextStatusIndex];

            $order->update(['status' => $nextStatus]);

            return redirect()->back()->with('success', 'Order status updated successfully');
        } else {
            dd("No next status available.");
        }
    }

    public function updatePayment(Request $request, Payment $payment)
    {
        $statuses = ['REJECTED', 'PROCCESS', 'PAID'];

        $currentStatusIndex = array_search($payment->payment_status, $statuses);

        if ($currentStatusIndex !== false) {
            $nextStatusIndex = ($currentStatusIndex + 1) % count($statuses);

            $nextStatus = $statuses[$nextStatusIndex];

            $payment->update(['payment_status' => $nextStatus]);

            return redirect()->back()->with('success', 'Payment status updated successfully');
        } else {
            dd("No next status available.");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Order::find($id);

            if (!$order) {
                return response()->json("Undefined order", 409);
            }

            $order->delete();


        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
        return response()->json("Success delete order !!", 200);
    }
}
