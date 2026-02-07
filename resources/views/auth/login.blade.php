@extends('layouts.app')

@section('content')
<div class="container" style="padding: 80px 20px;">
    <div style="max-width: 400px; margin: 0 auto; background: var(--white); padding: 40px; border-radius: 12px; box-shadow: var(--shadow-soft);">
        <h1 style="text-align: center; margin-bottom: 30px;">Login</h1>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 8px;">Email Address</label>
                <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                @error('email')
                <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 30px;">
                <label for="password" style="display: block; margin-bottom: 8px;">Password</label>
                <input type="password" name="password" id="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>

            <div style="margin-top: 20px; text-align: center; font-size: 0.9rem;">
                <p>Don't have an account? <a href="{{ route('register') }}" style="color: var(--primary-color);">Register here</a></p>
            </div>
        </form>
    </div>
</div>
@endsection