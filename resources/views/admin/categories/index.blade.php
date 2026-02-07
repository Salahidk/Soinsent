@extends('admin.layouts.app')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h1>Categories</h1>
    <a href="{{ route('admin.categories.create') }}" style="background: var(--primary-color); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">+ Add Category</a>
</div>

@if(session('success'))
<div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Products Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->products->count() }}</td>
                <td style="display: flex;">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn-action btn-edit">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
        {{ $categories->links() }}
    </div>
</div>
@endsection