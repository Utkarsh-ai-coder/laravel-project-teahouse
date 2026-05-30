<!-- Navbar Start -->
<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <img class="img-fluid" src="{{ asset('assets/img/logo.png') }}" alt="Logo">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}" >About</a>
                    <a href="{{ route('products') }}" class="nav-item nav-link {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                    <a href="{{ route('store') }}" class="nav-item nav-link {{ request()->routeIs('store') ? 'active' : '' }}">Store</a>

                    @if (Route::has('login'))

                        @auth
                            <a href="{{ route('logout') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="nav-item nav-link {{ request()->routeIs('register') ? 'active' : '' }}">Register</a>
                            @endif
                        @endauth

                @endif
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light rounded-0 m-0">
                            <a href="{{ route('feature') }}" class="dropdown-item">Features</a>
                            <a href="blog.html" class="dropdown-item">Blog Article</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> --}}
                    <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                </div>
                {{-- <div class="border-start ps-4 d-none d-lg-block">
                    <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                </div> --}}
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
