
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Kampung Kue Surabaya</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/')}}/fonts/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/style.css">
    @stack('css')
</head>

<body>
    <header class="header">
        <div class="ps-top-bar">
            <div class="container">
                @include('_navbar.topbar')
            </div>
        </div>
        <div class="ps-header--center header--mobile">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left">
                        <button class="navbar-toggler"><i class="icon-menu"></i></button>
                    </div>
                    <div class="header-inner__center"><a class="logo open" href="{{ url('/') }}">Kampung<span class="text-black">Kue</span></a></div>
                    <div class="header-inner__right">
                        <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="ps-header--center header-desktop">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left"><a class="logo" href="{{ url('/') }}">Kampung<span class="text-black">Kue</span></a>
                        
                    </div>
                    <div class="header-inner__center">
                        <form action="{{ url('produk') }}" method="GET">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="header-search-select">
                                        <span class="current">
                                            <span id="topbar_search_category_label">Semua Kategori</span>
                                            <i class="icon-chevron-down"></i>
                                        </span>
                                        @include('_navbar.navbar_category')
                                    </div><i class="icon-magnifier search"></i>
                                </div>
                                <input type="hidden" id="topbar_search_category_value" name="category" value="">
                                <input class="form-control input-search" name="name" placeholder="Cari kue di kampung kue..">
                                <div class="input-group-append">
                                    <button type="submit" class="btn">Cari</button>
                                </div>
                            </div>
                        </form>
                    {{-- <div class="trending-search">
                            <ul class="list-trending">
                                <li class="title"> <a>Produk Populer: </a>
                                </li>
                                <li class="trending-item"> <a href="#">Roti Lapis</a>
                                </li>
                                <li class="trending-item"> <a href="#">Kue Arisan</a>
                                </li>
                            </ul>
                        </div> --}}
                        @include('_navbar.result_search')
                    </div>
                    <div class="header-inner__right">
                        <a href="{{ route('cart.view') }}" class="button-icon btn-cart-header">
                            <i class="icon-cart icon-shop5"></i><span class="badge bg-warning total__cart hidden">1</span>
                            {{-- @include('_navbar.cart') --}}
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navigation">
            <div class="container">
                <ul class="menu">
                    <li class="menu-item-has-children has-mega-menu active">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('product.index') }}">Produk</a>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('merchant.index') }}">Unit Dagang</a>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('gallery.index') }}">Galeri</a>
                    </li>
                    <li class="menu-item-has-children has-mega-menu"> <a class="nav-link" href="{{ route('contact') }}">Kontak Kami</a>
                    </li>
                </ul>
            </div>
        </nav>
        @include('_navbar.search_mobile')
    </header>
    <main class="no-main">
        @yield('content')
    </main>
    @include('_footer.footer')
    @include('_footer.footer_mobile')
    
    <button class="btn scroll-top"><i class="icon-chevron-up"></i></button>
    {{-- <div class="ps-preloader" id="preloader">
        <div class="ps-preloader-section ps-preloader-left"></div>
        <div class="ps-preloader-section ps-preloader-right"></div>
    </div> --}}
    @include('_navbar.nav_mobile')
    <script src="{{url('/')}}/plugins/jquery.min.js"></script>
    <script src="{{url('/')}}/plugins/popper.min.js"></script>
    <script src="{{url('/')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/plugins/jquery.matchHeight-min.js"></script>
    <script src="{{url('/')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="{{url('/')}}/plugins/select2/dist/js/select2.min.js"></script>
    <script src="{{url('/')}}/plugins/slick/slick.js"></script>
    <script src="{{url('/')}}/plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
    <script src="{{url('/')}}/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>
        const BASE_URL = "{{ url('/') }}";
        const API_VERSION = "v1";
        const API_URL  = BASE_URL + "/api/" + API_VERSION + "/";
    </script>
    <script src="{{url('/')}}/js/cart.js"></script>
    @stack('js')
</body>
</html>