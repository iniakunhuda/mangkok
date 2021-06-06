@extends('layout', ['show_footer' => false])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">User</a></li>
            <li><a href="javascript:void(0);">Dashboard</a></li>
        </ul>
    </div>
</div>
<section class="section--user">
    <div class="container">
        <h1>Selamat Datang</h1>
        <p>Selamat berbelanja di Kampung Kue Surabaya</p>
    </div>
</section>
@endsection
