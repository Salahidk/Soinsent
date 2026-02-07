@extends('layouts.app')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 60px; align-items: center;">

        <!-- Image Section -->
        <div style="background-color: #f9f9f9; border-radius: 20px; overflow: hidden; height: 500px; display: flex; align-items: center; justify-content: center;">
            @if($product->image_path)
            <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
            @else
            <div style="color: #ccc;">No Image</div>
            @endif
        </div>

        <!-- Details Section -->
        <div>
            <div style="text-transform: uppercase; color: var(--text-light); margin-bottom: 10px; letter-spacing: 1px;">
                {{ $product->category }}
            </div>
            <h1 style="margin-bottom: 20px; font-size: 2.5rem;">{{ $product->name }}</h1>
            <div style="font-size: 1.8rem; font-weight: 600; color: var(--primary-color); margin-bottom: 30px;">
                ${{ $product->price }}
            </div>
            <p style="margin-bottom: 40px; color: var(--text-light); line-height: 1.8;">
                {{ $product->description }}
            </p>

            <form action="{{ route('cart.add', $product) }}" method="POST" style="display: flex; gap: 20px; align-items: center;">
                @csrf
                <input type="number" name="quantity" value="1" min="1" style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; width: 80px; text-align: center; font-size: 1rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1;">Add to Cart</button>
            </form>

            <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid #eee; font-size: 0.9rem; color: var(--text-light);">
                <p><i class="fas fa-truck"></i> Free shipping on orders over $50</p>
                <p style="margin-top: 10px;"><i class="fas fa-leaf"></i> 100% Organic Ingredients</p>
            </div>
        </div>
    </div>
</div>
@endsection