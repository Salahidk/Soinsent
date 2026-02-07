@extends('admin.layouts.app')

@section('content')
<h1 style="margin-bottom: 20px;">Manage Orders</h1>

@if(session('success'))
<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Total</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td><span class="badge badge-{{ strtolower($order->status) }}">{{ $order->status }}</span></td>
                <td>
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" style="display: flex; gap: 10px;">
                        @csrf
                        @method('PATCH')
                        <select name="status" style="padding: 5px; border-radius: 5px; border: 1px solid #ddd;">
                            <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                            <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" style="background: var(--primary-color); color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $orders->links() }}
    </div>
</div>
@endsection