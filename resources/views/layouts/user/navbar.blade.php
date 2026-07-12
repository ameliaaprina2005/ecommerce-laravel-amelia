<header class="header_area sticky-header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light main_box">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{ Auth::check() ? route('user.dashboard') : route('index.home') }}">
                    <img src="{{ asset('assets/templates/user/img/logo.png') }}" alt="Merch Store">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        @auth
                        <li class="nav-item {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">Home</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('user.history') || request()->routeIs('user.detail.history') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.history', Auth::id()) }}">
                                History
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">
                                Logout
                            </a>
                        </li>
                        @else
                        <li class="nav-item {{ request()->routeIs('index.home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('index.home') }}">Login</a>
                        </li>

                        <li class="nav-item {{ request()->routeIs('register') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>