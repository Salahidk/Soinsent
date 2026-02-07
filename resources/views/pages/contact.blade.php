@extends('layouts.app')

@section('content')
<!-- Contact Hero -->
<div class="shop-hero">
    <div class="container">
        <h1 style="color: var(--text-dark); margin-bottom: 20px;">Contact Us</h1>
        <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-light); max-width: 600px; margin: 0 auto;">
            We'd love to hear from you. Whether you have a question about our products, need assistance, or just want to say hello.
        </p>
    </div>
</div>

<div class="container" style="padding: 0 20px 80px;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 60px; max-width: 1000px; margin: 0 auto;">

        <!-- Contact Information -->
        <div>
            <h2 style="margin-bottom: 30px; font-size: 1.5rem;">Get in Touch</h2>

            <div style="margin-bottom: 30px;">
                <h4 style="color: var(--primary-color); margin-bottom: 10px;">Visit Us</h4>
                <p style="color: var(--text-light);">123 Natural Way<br>Green City, Eco State 90210</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h4 style="color: var(--primary-color); margin-bottom: 10px;">Email Us</h4>
                <p style="color: var(--text-light);">hello@soinsent.com<br>support@soinsent.com</p>
            </div>

            <div style="margin-bottom: 30px;">
                <h4 style="color: var(--primary-color); margin-bottom: 10px;">Call Us</h4>
                <p style="color: var(--text-light);">+1 (555) 123-4567<br>Mon-Fri, 9am - 6pm</p>
            </div>

            <div style="margin-top: 40px;">
                <h4 style="margin-bottom: 15px;">Follow Us</h4>
                <div style="display: flex; gap: 15px;">
                    <a href="#" style="color: var(--text-dark); font-size: 1.2rem;"><i class="fab fa-instagram"></i></a>
                    <a href="#" style="color: var(--text-dark); font-size: 1.2rem;"><i class="fab fa-facebook"></i></a>
                    <a href="#" style="color: var(--text-dark); font-size: 1.2rem;"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="background: var(--white); padding: 40px; border-radius: 16px; box-shadow: var(--shadow-soft);">
            <h2 style="margin-bottom: 30px; font-size: 1.5rem;">Send a Message</h2>
            <form>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500;">Name</label>
                    <input type="text" placeholder="Your Name" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-main);">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500;">Email</label>
                    <input type="email" placeholder="Your Email" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-main);">
                </div>
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500;">Subject</label>
                    <input type="text" placeholder="Subject" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-main);">
                </div>
                <div style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 500;">Message</label>
                    <textarea rows="5" placeholder="How can we help?" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: var(--font-main); resize: vertical;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection