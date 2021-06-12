@extends('layout')

@section('title')
    Pedagang
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5 pt-1">
        <div class="card">
            <div class="card-body">
                <h2>Profil Saya</h2>
                <p>Nama : {{ $merchants[auth()->user()->merchant]['name'] }}</p>
                <p>Deskripsi : {{ $merchants[auth()->user()->merchant]['desc'] }}</p>
                <p>Telp : {{ $merchants[auth()->user()->merchant]['telp'] }}</p>
                <p>Tipe Akun : <strong>{{ ($merchants[auth()->user()->merchant]['is_star_seller']) ? 'Premium' : 'Free' }}</strong></p>
            </div>
        </div>
    </div>

    @php
        $pesanan_diterima = 0;    
        $pesanan_ditolak = 0;    
        $pesanan_fiktif = 0;    

        foreach((array) $pesanan as $p){
            if(($p['status'] == "process") || $p['status'] == "done") $pesanan_diterima += $p['total'];
            if(($p['status'] == "cancel")) $pesanan_ditolak += $p['total'];
            if(($p['status'] == "fiktif")) $pesanan_fiktif += $p['total'];
        }
    @endphp

    <div class="section mt-5 pt-1">
        <div class="card">
            <div class="card-body">
                <h2>Pendapatan</h2>
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="mt-3">
                            <h4 class="text-primary">Pesanan Diterima</h4>
                            <h4>@currency($pesanan_diterima)</h4>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mt-3">
                            <h4 class="text-danger">Pesanan Ditolak</h4>
                            <h4>@currency($pesanan_ditolak)</h4>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mt-3">
                            <h4 class="text-danger">Pesanan Fiktif</h4>
                            <h4>@currency($pesanan_fiktif)</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection