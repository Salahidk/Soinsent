<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SoinSent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: var(--secondary-color);
            color: var(--text-dark);
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.05);
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-family: var(--font-serif);
            color: var(--primary-color);
        }

        .sidebar a {
            display: block;
            padding: 12px 15px;
            color: var(--text-dark);
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: 0.2s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary-color);
            color: white;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
        }

        .admin-content {
            flex: 1;
            padding: 30px;
            background: #f8f9fa;
        }

        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: var(--shadow-soft);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-card h3 {
            font-size: 2rem;
            color: var(--primary-color);
            margin: 0;
        }

        .stat-card p {
            margin: 0;
            color: var(--text-light);
        }

        .table-responsive {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: var(--shadow-soft);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            font-weight: 600;
            color: var(--text-dark);
        }

        .badge {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .badge-pending {
            background: #ffeeba;
            color: #856404;
        }

        .badge-processing {
            background: #b8daff;
            color: #004085;
        }

        .badge-shipped {
            background: #c3e6cb;
            color: #155724;
        }

        .btn-action {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            margin-right: 5px;
        }

        .btn-edit {
            background: var(--secondary-color);
            color: var(--text-dark);
        }

        .btn-delete {
            background: #ffcccc;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <h2>SoinSent Admin</h2>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Categories
            </a>
            <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="fas fa-box"></i> Products
            </a>
            <a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="fas fa-shopping-bag"></i> Orders
            </a>
            <a href="{{ route('admin.customers.index') }}" class="{{ request()->routeIs('admin.customers.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Customers
            </a>
            <a href="{{ route('home') }}" target="_blank" style="margin-top: 50px; background: none; border: 1px solid #ddd;">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
        </aside>
        <main class="admin-content">
            @yield('content')
        </main>
    </div>
</body>

</html>