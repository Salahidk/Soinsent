@extends('layouts.app')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <h1 style="margin-bottom: 40px; text-align: center;">Checkout</h1>

    <div style="display: flex; gap: 40px; flex-wrap: wrap;">
        <!-- Order Summary -->
        <div style="flex: 1; min-width: 300px; background: #f9f9f9; padding: 30px; border-radius: 12px; height: fit-content;">
            <h3 style="margin-bottom: 20px;">Order Summary</h3>

            <div style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 20px;">
                @foreach($cart as $details)
                <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <span>{{ $details['name'] }} x {{ $details['quantity'] }}</span>
                    <span>${{ $details['price'] * $details['quantity'] }}</span>
                </div>
                @endforeach
            </div>

            <div style="display: flex; justify-content: space-between; font-size: 1.2rem; font-weight: 600;">
                <span>Total</span>
                <span>${{ $total }}</span>
            </div>
        </div>

        <!-- Checkout Form -->
        <div style="flex: 2; min-width: 300px;">
            <div style="background: var(--white); padding: 30px; border-radius: 12px; box-shadow: var(--shadow-soft);">
                <h3 style="margin-bottom: 20px;">Shipping Details</h3>

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px;">Full Name</label>
                        <input type="text" value="{{ Auth::user()->name }}" readonly style="width: 100%; padding: 12px; background: #f0f0f0; border: 1px solid #ddd; border-radius: 6px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; margin-bottom: 8px;">Shipping Address</label>
                        <textarea name="address" required rows="4" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px;" placeholder="123 Main St, City, Country"></textarea>
                    </div>

                    <h3 style="margin-bottom: 20px; margin-top: 40px;">Payment</h3>
                    <div style="padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #fafafa; margin-bottom: 30px;">
                        <p style="color: var(--text-light);"><i class="fas fa-lock"></i> Secure Payment Placeholder</p>
                        <div style="margin-top: 15px;">
                            <label style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                <input type="radio" name="payment_method" value="card" checked> Credit Card (Simulated)
                            </label>
                            <label style="display: flex; align-items: center; gap: 10px;">
                                <input type="radio" name="payment_method" value="paypal"> PayPal (Simulated)
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">Place Order</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection