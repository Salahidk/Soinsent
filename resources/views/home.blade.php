@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); height: 90vh;">
    <div class="container" style="width: 100%;">
        <div style="max-width: 700px; text-align: left;">
            <h1 style="font-size: 3.5rem; margin-bottom: 20px; font-family: var(--font-serif); text-shadow: 0 2px 4px rgba(0,0,0,0.3); color: var(--text-dark);">Natural Beauty, Refined.</h1>
            <p style="font-size: 1.2rem; margin-bottom: 30px; color: var(--text-dark); text-shadow: 0 1px 2px rgba(255,255,255,0.3);">
                Discover our premium collection of organic cosmetics designed to enhance your natural radiance.
            </p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary" style="background-color: var(--primary-color); border: none;">Shop Collection</a>
        </div>
    </div>

    <div class="scroll-indicator">
        <p>Scroll Down</p>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Featured Products -->
<section class="featured" style="padding: 80px 0;">
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 50px;">Featured Products</h2>

        <div class="product-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            @forelse($featuredProducts as $product)
            <div class="product-card">
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
                    <a href="{{ route('shop.show', $product) }}" class="btn btn-outline" style="margin-top: 15px; font-size: 0.8rem; padding: 8px 18px;">View Details</a>
                </div>
            </div>
            @empty
            <p style="text-align: center; width: 100%;">No products found. Run seeders?</p>
            @endforelse
        </div>
    </div>
</section>

<!-- About Teaser -->
<section class="about-teaser" style="background-color: #fff; padding: 80px 0;">
    <div class="container" style="display: flex; align-items: center; gap: 50px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <!-- Placeholder for an image -->
            <div style="width: 100%; height: 400px; background-color: #f0f0f0; border-radius: 12px;"></div>
        </div>
        <div style="flex: 1; min-width: 300px;">
            <h2 style="margin-bottom: 20px;">Our Philosophy</h2>
            <p style="margin-bottom: 25px; color: var(--text-light);">
                At SoinSent, we believe that beauty should be pure and simple. Our products are crafted with the finest natural ingredients, ensuring that your skin receives the care it deserves without any harsh chemicals.
            </p>
            <a href="{{ route('about') }}" class="btn btn-outline">Read More</a>
        </div>
    </div>
</section>
@endsection