@extends('admin.layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Products</h1>
    <a href="{{ route('admin.products.create') }}" style="background: var(--primary-color); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">+ Add Product</a>
</div>

@if(session('success'))
<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>
                    @if($product->image_path)
                    <img src="{{ asset($product->image_path) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                    @else
                    <span style="display: inline-block; width: 50px; height: 50px; background: #eee; border-radius: 5px;"></span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td style="display: flex;">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn-action btn-edit">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete" style="border: none; cursor: pointer;">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
</div>
@endsection