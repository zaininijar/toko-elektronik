<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::get();
        $slides = [
            ['id' => 1, 'title' => 'Hannochs T-Bulb Lampu Led Kapsul', 'picture_path' => asset('img/slides/0fbfb-T-BULB.jpg')],
            ['id' => 2, 'title' => 'Hannochs Lampu Led Solar Panel', 'picture_path' => asset('img/slides/057e7-LAMPU LED SOLAR PANEL.jpg')],
            ['id' => 3, 'title' => 'Hannochs Lampu Led Fungsional', 'picture_path' => asset('img/slides/24200-LED FUNGSIONAL.jpg')],
            ['id' => 4, 'title' => 'Hannochs Alkaline', 'picture_path' => asset('img/slides/47b63-ALKALINE.jpg')],
            ['id' => 5, 'title' => 'Hannochs Led Emergency AC/DC', 'picture_path' => asset('img/slides/49a40-LED EMERGENCY.jpg')],
            ['id' => 6, 'title' => 'Jelajahi Semua Produk Kami', 'picture_path' => asset('img/slides/6c7ea-CanggihGakHarusRibet.jpg')]
        ];
        return view('customer.home', ['products' => $products, 'slides' => $slides]);
    }
}
