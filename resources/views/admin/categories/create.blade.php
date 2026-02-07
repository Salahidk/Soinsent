@extends('admin.layouts.app')

@section('content')
<h1 style="margin-bottom: 20px;">Add New Category</h1>

<div style="background: white; padding: 30px; border-radius: 10px; box-shadow: var(--shadow-soft); max-width: 600px;">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Category Name</label>
            <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Description</label>
            <textarea name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
        </div>

        <button type="submit" style="background: var(--primary-color); color: white; padding: 12px 25px; border: none; border-radius: 5px; cursor: pointer; font-size: 1rem;">Create Category</button>
    </form>
</div>
@endsection