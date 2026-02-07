<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-col">
                <h4>SoinSent</h4>
                <p>Natural cosmetic products for your daily care.</p>
            </div>
            <div class="footer-col">
                <h4>Shop</h4>
                <ul>
                    <li><a href="{{ route('shop.index') }}">All Products</a></li>
                    <li><a href="#">Skin Care</a></li>
                    <li><a href="#">Hair Care</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Information</h4>
                <ul>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    <li><a href="{{ route('cookies') }}">Cookies</a></li>
                    <li><a href="{{ route('privacy') }}">Confidentiality Politics</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Account</h4>
                <ul>
                    @auth
                    <li><a href="{{ route('account.index') }}">My Order History</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" style="background:none; border:none; color:#cccccc; cursor:pointer;">Logout</button>
                        </form>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SoinSent. All rights reserved.</p>
        </div>
    </div>
</footer>