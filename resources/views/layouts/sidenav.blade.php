<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                {{-- <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="..."> --}}
                Pemilihan Sepatu
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/webadmin/dashboard">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('users.index')) === 0 ? 'active' : '' }}" href="{{ route('users.index') }}">
                            <i class="ni ni-single-02 text-primary"></i>
                            <span class="nav-link-text">Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('categories.index')) === 0 ? 'active' : '' }}" href="{{ route('categories.index') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Kriteria</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('categories-subs.index')) === 0 ? 'active' : '' }}" href="{{ route('categories-subs.index') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Sub Kriteria</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('products.index')) === 0 ? 'active' : '' }}" href="{{ route('products.index') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('products-qualities.index')) === 0 ? 'active' : '' }}" href="{{ route('products-qualities.index') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Alternatif Produk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ strpos(Request::url(), route('result.index')) === 0 ? 'active' : '' }}" href="{{ route('result.index') }}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Hasil MOORA</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>