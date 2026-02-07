<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = \App\Models\Order::count();
        $totalProducts = \App\Models\Product::count();
        $recentOrders = \App\Models\Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalOrders', 'totalProducts', 'recentOrders'));
    }
}
