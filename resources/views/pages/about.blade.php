@extends('layouts.app')

@section('content')
<!-- About Hero Section (Reusing Shop Hero Design) -->
<div class="shop-hero"> <!-- Reusing existing class for gradient and spacing -->
    <div class="container">
        <h1 style="color: var(--text-dark); margin-bottom: 20px;">About SoinSent</h1>
        <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light); max-width: 800px; margin: 0 auto;">
            SoinSent was born from a passion for natural beauty and a commitment to sustainability. We believe that caring for your skin shouldn't come at the expense of the environment.
        </p>
    </div>
</div>

<div class="container" style="padding: 0 20px 80px;">
    <div style="max-width: 900px; margin: 0 auto; text-align: center;">
        <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light); margin-bottom: 50px;">
            Our mission is to provide high-quality, organic cosmetic products that nourish your body and soul. Every product is carefully crafted with ethically sourced ingredients, ensuring purity and potency.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; text-align: center;">
            <div style="background: #fff; padding: 40px 20px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <i class="fas fa-leaf" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 15px;">100% Organic</h3>
                <p style="font-size: 0.95rem; color: #666;">Only the finest natural ingredients, sourced responsibly from nature.</p>
            </div>
            <div style="background: #fff; padding: 40px 20px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <i class="fas fa-paw" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 15px;">Cruelty Free</h3>
                <p style="font-size: 0.95rem; color: #666;">We love animals. Our products are never tested on our furry friends.</p>
            </div>
            <div style="background: #fff; padding: 40px 20px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.05);">
                <i class="fas fa-recycle" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 20px;"></i>
                <h3 style="margin-bottom: 15px;">Eco Friendly</h3>
                <p style="font-size: 0.95rem; color: #666;">Sustainable packaging and practices to minimize our footprint.</p>
            </div>
        </div>

        <div style="margin-top: 80px; text-align: left;">
            <h2 style="text-align: center; margin-bottom: 40px; font-size: 2rem;">Our Story</h2>
            <div style="display: flex; gap: 40px; align-items: center; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px;">
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light); margin-bottom: 20px;">
                        It all started with a realization: the beauty industry was filled with harsh chemicals and plastic waste. We wanted to change that.
                    </p>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light);">
                        From a small kitchen experiment to a beloved brand, SoinSent has remained true to its roots. We source our ingredients directly from organic farmers who share our values. We believe in transparency, quality, and the power of nature to heal and rejuvenate.
                    </p>
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <img src="{{ asset('images/about-story.jpg') }}" alt="Our Story" style="width: 100%; border-radius: 20px; box-shadow: var(--shadow-soft);" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1556228578-0d85b1a4d571?auto=format&fit=crop&w=800&q=80';">
                </div>
            </div>
        </div>

        <!-- Contact CTA -->
        <div style="margin-top: 100px; background: var(--secondary-color); padding: 60px; border-radius: 20px; text-align: center; color: var(--text-dark);">
            <h2 style="margin-bottom: 20px;">Have Questions?</h2>
            <p style="font-size: 1.1rem; max-width: 600px; margin: 0 auto 30px;">
                We are here to help you find the perfect products for your skin. Reach out to us anytime.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-primary" style="padding: 15px 40px; font-size: 1.1rem;">Contact Us</a>
        </div>
    </div>
</div>
@endsection