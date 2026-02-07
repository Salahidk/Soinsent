<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Get featured products (e.g., latest 4)
        $featuredProducts = Product::latest()->take(4)->get();
        return view('home', compact('featuredProducts'));
    }
}
