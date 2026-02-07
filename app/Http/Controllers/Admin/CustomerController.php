<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::where('is_admin', false)->withCount('orders')->latest()->paginate(10);
        return view('admin.customers.index', compact('users'));
    }
}
