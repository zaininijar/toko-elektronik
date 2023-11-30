<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orderCounts = Order::selectRaw('DATE_FORMAT(created_at, "%M") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderByRaw('MIN(created_at)')
            ->get();

        $labels = $orderCounts->pluck('month')->toArray();
        $data = $orderCounts->pluck('count')->toArray();

        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Orders',
                    'fill' => false,
                    'backgroundColor' => '#7e3af2',
                    'borderColor' => '#7e3af2',
                    'data' => $data,
                ],
            ],
        ];


        $customers = User::where('role', 'customer')->get();
        $payment = Payment::where('payment_status', 'PAID')->get();
        $orders = Order::get();
        $last_transactions = Order::orderBy('created_at', 'DESC')->take(5)->get();
        $products = Product::get();

        $customers_count = $customers->count();
        $total_amount = $payment->sum('total_amount');
        $total_order = $orders->count();
        $total_product = $products->count();

        return view('dashboard', ['customers_count' => $customers_count, 'total_amount' => $total_amount, 'total_order' => $total_order, 'total_product' => $total_product, 'last_transactions' => $last_transactions, 'chartData' => $chartData]);
    }
}
