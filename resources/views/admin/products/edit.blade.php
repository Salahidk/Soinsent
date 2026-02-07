@extends('admin.layouts.app')

@section('content')
<h1 style="margin-bottom: 20px;">Edit Product: {{ $product->name }}</h1>

@if ($errors->any())
<div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
    <ul style="margin: 0; padding-left: 20px;">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div style="background: white; padding: 30px; border-radius: 10px; box-shadow: var(--shadow-soft); max-width: 600px;">
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Category</label>
            <select name="category_id" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 15px;">
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Price ($)</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div>
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Description</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">{{ $product->description }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Product Image</label>
            @if($product->image_path)
            <div style="margin-bottom: 10px;">
                <img src="{{ asset($product->image_path) }}" alt="Current Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                <p style="font-size: 0.8rem; color: #666;">Current Image</p>
            </div>
            @endif
            <input type="file" name="image" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <button type="submit" style="background: var(--primary-color); color: white; padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;">Update Product</button>
    </form>
</div>
@endsection