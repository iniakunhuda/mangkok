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

</div>
@endsection