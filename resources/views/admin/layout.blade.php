
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('')}}/admin_assets/css/style.css">
    <link rel="stylesheet" href="{{ url('plugins/datatables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap4.min.css') }}">
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
            <h3 class="mt-1" style="color:#FFF">KampungKue</h3>
            {{-- <img src="{{ url('img/logo.png') }}" alt="logo" class="logo"> --}}
        </div>
        <div class="right">
            {{-- <a href="app-notifications.html" class="headerButton">
                <ion-icon class="icon" name="notifications-outline"></ion-icon>
                <span class="badge badge-danger">4</span>
            </a> --}}
            <a href="{{ route('admin.logout') }}" class="headerButton">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div>
    </div>

    @yield('content')

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="{{ route('admin.home') }}" class="item brown active">
            <div class="col">
                <ion-icon name="home"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="{{ route('admin.products.index') }}" class="item brown">
            <div class="col">
                <ion-icon name="albums-outline"></ion-icon>
                <strong>Produk</strong>
            </div>
        </a>
        <a href="app-components.html" class="item brown">
            <div class="col">
                <ion-icon name="cart-outline"></ion-icon>
                <strong>Transaksi</strong>
            </div>
        </a>
        <a href="app-cards.html" class="item brown">
            <div class="col">
                <ion-icon name="cog-outline"></ion-icon>
                <strong>Pengaturan</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    @include('admin._sidebar')

    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="{{url('')}}/admin_assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <!-- Splide -->
    <script src="{{url('')}}/admin_assets/js/plugins/splide/splide.min.js"></script>
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
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