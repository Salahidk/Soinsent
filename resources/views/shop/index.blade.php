@extends('layouts.app')

@section('content')
<!-- Promotions Hero Section (Full Width) -->
<div class="shop-hero">
    <div class="container">
        <div class="promotions-grid">
            <!-- Promo Card 1 -->
            <div class="promo-card" style="background-color: #4a6c56; background-image: url('{{ asset('images/promo-bg-1.jpg') }}');">
                <!-- Note: Using placeholder bg color similar to reference green if image missing -->
                <div class="promo-grid-bg-overlay"></div>
                <div class="promo-badge">Limited Edition</div>
                <div class="promo-content">
                    <div class="promo-title-large">Pine Needle<br>Mandarin</div>
                    <a href="#" class="promo-btn">Shop Now</a>
                </div>
                <!-- Simulating product image on right if we had it, for now just bg -->
            </div>

            <!-- Promo Card 2 -->
            <div class="promo-card" style="background-color: #6c4a4a; background-image: url('{{ asset('images/promo-bg-2.jpg') }}');">
                <!-- Note: Using placeholder bg color similar to reference red/brown if image missing -->
                <div class="promo-grid-bg-overlay"></div>
                <div class="promo-badge">Limited Edition</div>
                <div class="promo-content">
                    <div class="promo-title-large">Winter<br>Berries</div>
                    <a href="#" class="promo-btn">Shop Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="shop-filter-container">
        <form action="{{ route('shop.index') }}" method="GET" class="shop-filter-form">
            <div class="filter-group start-group">
                <i class="fas fa-search"></i>
                <input type="text" name="search" id="live-search-input" placeholder="Search products..." value="{{ request('search') }}" autocomplete="off">
                <div id="live-search-results" class="live-search-results"></div>
            </div>
            <div class="filter-group end-group">
                <select name="category" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->name }}" {{ request('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <i class="fas fa-chevron-down"></i>
            </div>
            <button type="submit" style="display: none;">Filter</button> <!-- Implicit submit on enter -->
        </form>
    </div>
</div>
</div>

<div class="container" style="padding: 0 20px 60px;">

    <!-- Product Grid Header -->
    <h1 style="margin-bottom: 40px; text-align: center; border-top: 1px solid #eee; padding-top: 40px;">All Products</h1>

    <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 40px;">
        @forelse($products as $product)
        <div class="product-card">
            <a href="{{ route('shop.show', $product) }}" style="display: block; color: inherit;">
                <div class="product-image">
                    @if($product->image_path)
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}">
                    @else
                    <div style="color: #ccc;">No Image</div>
                    @endif
                </div>
                <div class="product-info">
                    <div class="product-category">{{ $product->category }}</div>
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <div class="product-price">${{ $product->price }}</div>
                </div>
            </a>
            <div style="padding: 0 15px 15px; text-align: center;">
                <form action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form" data-product-id="{{ $product->id }}">
                    @csrf
                    <button type="submit" class="btn btn-primary add-to-cart-btn" style="width: 100%; font-size: 0.9rem;">Add to Cart</button>
                </form>

                <div class="cart-actions" id="cart-actions-{{ $product->id }}" style="display: none; gap: 10px; justify-content: center;">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline" style="font-size: 0.8rem; padding: 8px 15px; flex: 1;">View Cart</a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary" style="font-size: 0.8rem; padding: 8px 15px; flex: 1;">Checkout</a>
                </div>
            </div>
        </div>
        @empty
        <p style="text-align: center; width: 100%;">No products found.</p>
        @endforelse
    </div>

    <div style="margin-top: 50px;">
        {{ $products->links() }}
    </div>
</div>
@endsection