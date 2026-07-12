<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">TEKNIK INFORMATIKA|RPL</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">MS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="{{ request()->routeIs('admin.product') || request()->routeIs('product.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.product') }}">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.distributor') || request()->routeIs('distributor.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.distributor') }}">
                    <i class="fas fa-truck"></i>
                    <span>Distributor</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.flashsale') || request()->routeIs('flashsale.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.flashsale') }}">
                    <i class="fas fa-bolt"></i>
                    <span>Flash Sale</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.history') || request()->routeIs('history.detail') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.history') }}">
                    <i class="fas fa-history"></i>
                    <span>History Pembelian</span>
                </a>
            </li>
            <li class="menu-header">Website</li>
            <li>
                <a class="nav-link" href="{{ route('index.home') }}">
                    <i class="fas fa-home"></i>
                    <span>Halaman Utama</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('admin.logout') }}">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </aside>
</div>