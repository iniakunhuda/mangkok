<nav class="navigation--mobile">
    <div class="navigation__header">
        <div class="navigation__select">
        </div>
        <div class="navigation-title">
            <button class="close-navbar-slide"><i class="icon-arrow-left"></i></button>

            @if(\Auth::check())
            <div>
                <span> <i class="icon-user"></i>Hi, </span>
                <span class="account">{{ \Auth::user()->name }}</span>
                <a class="dropdown-user" href="javascript:void(0)" id="dropdownAccount" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-chevron-down"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="javascript:void(0)"><b>Akun Saya</b></a>
                    <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                    <a class="dropdown-item" href="">Pesanan Saya</a>
                    <a class="dropdown-item" href="">Akun Saya</a>
                    <hr>
                    <a class="account-logout" href="javascript:void(0)" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="icon-exit-left"></i>Keluar</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none hidden">
                        @csrf
                    </form>
                </div>
            </div>
            @else
            <div>
                <a href="{{ route('login') }}"><i class="icon-enter"></i> Login</a>
            </div>
            @endif
        </div>
    </div>
    <div class="navigation__content">
        <ul class="menu--mobile">
            <li class="menu-item-has-children has-mega-menu active">
                <a class="nav-link active" href="{{ url('/') }}">Home</a>
            </li>
            <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
            </li>
            <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('product.index') }}">Produk</a>
            </li>
            <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('merchant.index') }}">Unit Dagang</a>
            </li>
            <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('contact') }}">Kontak Kami</a>
            </li>
        </ul>
    </div>
</nav>