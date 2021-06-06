@extends('admin.layouts.template')
@section('tittle','Homepage Kampung Kue Surabaya')
@section('content')
<body>
<div class="section mt-2 mb-2">
    <div class="wallet-card">
        <div class="heading">
            <h2 class="title">Dashboard</h2>
            <p class="subtitle">Period: <?php echo date('D, d M Y') ?></p>
        </div>
        <div class="right">
                <ion-icon name="add-outline"></ion-icon>
            </a>
        </div>

        <div class="section">
            <div class="row mt-1">
                <div class="col-4">
                    <div class="stat-box">
                        <div class="title">Pedagang</div>
                        <div class="value text-success"> {{ $merchants }} </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="stat-box">
                        <div class="title">Produk</div>
                        <div class="value text-danger">{{ $products }}</div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="stat-box">
                        <div class="title">Transaksi</div>
                        <div class="value">100</div>
                    </div>
                </div>
            </div>
            </div>


    </div>
</body>
@endsection

