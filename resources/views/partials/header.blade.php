<header class="{{ in_array(Route::currentRouteName(), ['shop.index', 'shop.show', 'shop.search', 'about', 'contact']) ? 'header-red-text' : '' }}">
    <div class="container">
        <nav>
            <div class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('shop.index') }}">Shop</a>

                <!-- Mega Menu Trigger -->
                <div class="dropdown-parent">
                    <a href="{{ route('shop.index') }}">Categories</a>
                    <div class="mega-menu">
                        <div class="mega-menu-content">
                            @foreach($headerCategories as $category)
                            <a href="{{ route('shop.index', ['search' => $category->slug]) }}" class="mega-menu-item">
                                @if($category->products->first())
                                <img src="{{ asset($category->products->first()->image_path) }}" alt="{{ $category->name }}">
                                @else
                                <div class="mega-menu-placeholder"></div>
                                @endif
                                <div class="mega-menu-text">
                                    <h4>{{ $category->name }}</h4>
                                    <p>{{ \Illuminate\Support\Str::limit($category->description, 40) }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a> <!-- Added link to be explicit -->
            </div>

            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="SoinSent" style="height: 50px;">
                </a>
            </div>

            <div class="nav-icons">
                <!-- Search Bar -->
                <div class="search-container">
                    <form action="{{ route('shop.index') }}" method="GET">
                        <input type="text" name="search" class="search-input" placeholder="Search products..." data-search-url="{{ route('shop.search') }}">
                        <button type="button" class="btn-icon" onclick="document.querySelector('.search-input').focus()">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="search-results"></div>
                </div>

                <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart"></i></a>

                <!-- Account Dropdown -->
                <div class="account-dropdown-parent">
                    <a href="{{ route('account.index') }}"><i class="fas fa-user"></i></a>
                    <div class="account-dropdown">
                        @auth
                        <div class="account-info">
                            <p>Welcome,</p>
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>

                        @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                        <a href="{{ route('admin.categories.index') }}">Manage Categories</a>
                        <a href="{{ route('admin.products.index') }}">Manage Products</a>
                        <a href="{{ route('admin.orders.index') }}">Manage Orders</a>
                        @else
                        <a href="{{ route('account.index') }}">Order History</a>
                        <a href="#">Edit Profile</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:var(--text-dark); font:inherit; cursor:pointer; width:100%; text-align:left; padding:8px 0;">Logout</button>
                        </form>
                        @endauth

                        @guest
                        <div class="account-info">
                            <p>Welcome, Guest</p>
                        </div>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>