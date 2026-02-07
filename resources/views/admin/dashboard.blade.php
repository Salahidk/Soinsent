@extends('admin.layouts.app')

@section('content')
<h1 style="margin-bottom: 30px;">Dashboard Overview</h1>

<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
    <div class="stat-card">
        <div>
            <h3>{{ $totalOrders }}</h3>
            <p>Total Orders</p>
        </div>
        <i class="fas fa-shopping-bag fa-2x" style="color: #ddd;"></i>
    </div>
    <div class="stat-card">
        <div>
            <h3>{{ $totalProducts }}</h3>
            <p>Total Products</p>
        </div>
        <i class="fas fa-box fa-2x" style="color: #ddd;"></i>
    </div>
    <div class="stat-card">
        <div>
            <h3>$0</h3>
            <p>Total Revenue (Demo)</p>
        </div>
        <i class="fas fa-dollar-sign fa-2x" style="color: #ddd;"></i>
    </div>
</div>

<h2>Recent Orders</h2>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recentOrders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td><span class="badge badge-{{ strtolower($order->status) }}">{{ $order->status }}</span></td>
                <td>{{ $order->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection