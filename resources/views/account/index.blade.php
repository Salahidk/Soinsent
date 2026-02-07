@extends('layouts.app')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <h1>My Account</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline">Logout</button>
        </form>
    </div>

    <div style="background: var(--white); padding: 30px; border-radius: 12px; box-shadow: var(--shadow-soft);">
        <h2 style="margin-bottom: 20px;">Order History</h2>

        @forelse ($orders as $order)
        <div style="border: 1px solid #eee; border-radius: 8px; padding: 20px; margin-bottom: 20px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 15px; border-bottom: 1px solid #f5f5f5; padding-bottom: 10px;">
                <div>
                    <strong>Order #{{ $order->id }}</strong><br>
                    <span style="color: var(--text-light); font-size: 0.9rem;">{{ $order->created_at->format('M d, Y') }}</span>
                </div>
                <div style="text-align: right;">
                    <span style="font-weight: 600;">${{ $order->total_price }}</span><br>
                    <span style="display: inline-block; padding: 2px 8px; border-radius: 4px; background: #eee; font-size: 0.8rem; margin-top: 5px;">{{ ucfirst($order->status) }}</span>
                </div>
            </div>

            <div>
                @foreach ($order->items as $item)
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 10px;">
                    <!-- Optional: Small image thumbnail could go here -->
                    <div style="flex: 1;">
                        {{ $item->product ? $item->product->name : 'Product Unavailable' }} x {{ $item->quantity }}
                    </div>
                    <div>
                        ${{ $item->price }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @empty
        <p>You haven't placed any orders yet.</p>
        <a href="{{ route('shop.index') }}" class="btn btn-primary" style="margin-top: 15px;">Start Shopping</a>
        @endforelse
    </div>
</div>
@endsection