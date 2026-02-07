@extends('layouts.app')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <h1 style="margin-bottom: 40px;">Shopping Cart</h1>

    @if(session('success'))
    <div style="background: #e6fffa; color: #2c7a7b; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif

    @if(count($cart) > 0)
    <div style="background: var(--white); border-radius: 12px; box-shadow: var(--shadow-soft); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9f9f9; text-align: left;">
                    <th style="padding: 20px; font-weight: 600;">Product</th>
                    <th style="padding: 20px; font-weight: 600;">Price</th>
                    <th style="padding: 20px; font-weight: 600;">Quantity</th>
                    <th style="padding: 20px; font-weight: 600;">Subtotal</th>
                    <th style="padding: 20px; font-weight: 600;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $details)
                <tr style="border-bottom: 1px solid #eee;">
                    <td style="padding: 20px;">
                        <div style="display: flex; align-items: center; gap: 15px;">
                            @if($details['image_path'])
                            <div style="width: 50px; height: 50px; background: #f0f0f0; display: flex; align-items: center; justify-content: center; border-radius: 4px; overflow: hidden;">
                                <img src="{{ asset($details['image_path']) }}" alt="{{ $details['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            @endif
                            <span>{{ $details['name'] }}</span>
                        </div>
                    </td>
                    <td style="padding: 20px;">${{ $details['price'] }}</td>
                    <td style="padding: 20px;">
                        <form action="{{ route('cart.update', $id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" style="width: 60px; padding: 8px; border: 1px solid #ddd; border-radius: 4px;" onchange="this.form.submit()">
                        </form>
                    </td>
                    <td style="padding: 20px; color: var(--primary-color); font-weight: 600;">
                        ${{ $details['price'] * $details['quantity'] }}
                    </td>
                    <td style="padding: 20px;">
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #e53e3e; background: none; border: none; cursor: pointer; font-size: 1.1rem;"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
        <a href="{{ route('shop.index') }}" class="btn btn-outline">&larr; Continue Shopping</a>

        <div style="text-align: right;">
            <h3 style="margin-bottom: 15px; font-size: 1.5rem;">Total: <span style="color: var(--primary-color);">${{ $total }}</span></h3>
            <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="padding: 15px 40px;">Proceed to Checkout</a>
        </div>
    </div>
    @else
    <div style="text-align: center; padding: 60px 0;">
        <h3>Your cart is empty</h3>
        <p style="color: var(--text-light); margin-bottom: 20px;">Looks like you haven't added anything yet.</p>
        <a href="{{ route('shop.index') }}" class="btn btn-primary">Start Shopping</a>
    </div>
    @endif
</div>
@endsection