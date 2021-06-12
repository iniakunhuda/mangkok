
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('plugins/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{url('')}}/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{url('/')}}/plugins/select2/dist/css/select2.min.css">
    <script src="{{url('/')}}/plugins/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('css')
</head>

<body>
    
    <div class="appHeader bg-brown text-light">
        <div class="left">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <h3 class="mt-1" style="color:#FFF">
                <a style="color:#FFF" href="{{ url('/') }}">Mangkok</a>
            </h3>
        </div>
        {{-- <div class="right">
            <a href="{{ route('merchant.logout') }}" class="headerButton">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div> --}}
    </div>

    @yield('content')

    <!-- App Bottom Menu -->
    @if(!\Auth::check())
    <div class="appBottomMenu">
        <a href="{{ route('index') }}" class="item brown {{ request()->routeIs('index') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="{{ route('menu') }}" class="item brown {{ (request()->routeIs('menu') || request()->routeIs('menu.detail')) ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="albums-outline"></ion-icon>
                <strong>Cari Menu</strong>
            </div>
        </a>
        <a href="{{ route('pesanan') }}" class="item brown {{ request()->routeIs('pesanan') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="cart-outline"></ion-icon>
                <span class="badge bg-warning total__cart hidden">1</span>
                <strong>Pesanan</strong>
            </div>
        </a>
        <a href="{{ route('riwayat_pesanan') }}" class="item brown {{ (request()->routeIs('riwayat_pesanan') || request()->routeIs('detail_riwayat_pesanan')) ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="bag-check-outline"></ion-icon>
                <strong>Riwayat Pesanan</strong>
            </div>
        </a>
    </div>
    @endif
    <!-- * App Bottom Menu -->

    @if(\Auth::check())
    <div class="appBottomMenu">
        <a href="{{ route('home') }}" class="item brown {{ request()->routeIs('home') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="{{ route('home.riwayat_pesanan') }}" class="item brown {{ (request()->routeIs('riwayat_pesanan') || request()->routeIs('detail_riwayat_pesanan')) ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="bag-check-outline"></ion-icon>
                <strong>Pesanan Pembeli</strong>
            </div>
        </a>
    </div>
    @endif

    @include('_sidebar')

    <!-- ========= JS Files =========  -->
    <script src="{{url('')}}/assets/js/lib/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="{{url('')}}/assets/js/plugins/splide/splide.min.js"></script>
    <script src="{{url('')}}/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{url('/')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="{{url('/')}}/plugins/select2/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script>
        const BASE_URL = "{{ url('/') }}";
        const API_VERSION = "v1";
        const API_URL  = BASE_URL + "/api/" + API_VERSION + "/";
    </script>
    <script src="{{ url('assets/js/cart.js') }}"></script>
    @include('sweet::alert')
    <script>
        function deleteRow(id, nama) {
            swal({
                title: "Apakah anda yakin?",
                text: "Anda akan menghapus data " + nama,
                icon: "warning",
                buttons: [
                    'Batal',
                    'Hapus'
                ],
                dangerMode: true,
                }).then(function(isConfirm) {
                if (isConfirm) {
                    $('#form_delete_'+id).submit();
                }
            })
        }
    </script>

    @stack('js')

</body>
</html>