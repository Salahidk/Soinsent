@extends('admin.layouts.app')

@section('content')
<h1 style="margin-bottom: 20px;">Registered Customers</h1>

<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined Date</th>
                <th>Total Orders</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M d, Y') }}</td>
                <td>{{ $user->orders_count }}</td>
                <td>
                    <a href="mailto:{{ $user->email }}" style="background: var(--primary-color); color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none; font-size: 0.8rem;">Email</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px;">
        {{ $users->links() }}
    </div>
</div>
@endsection