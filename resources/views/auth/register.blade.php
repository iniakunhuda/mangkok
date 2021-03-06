@extends('layout', ['show_footer' => false])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Register</a></li>
        </ul>
    </div>
</div>
<section class="section--login">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="login__box">
                    <div class="login__header">
                        <h3 class="login__register"><a href="{{ url('login') }}">MASUK</a></h3>
                        <h3 class="login__login"><a href="{{ url('register') }}">DAFTAR</a></h3>
                    </div>
                    <div class="login__content">
                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="login__label">Daftarkan akun Anda.</div>

                            <label>Nama Lengkap</label>
                            <div class="input-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Whatsapp</label>
                            <div class="input-group">
                                <input id="whatsapp" type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp" autofocus>
                                @error('whatsapp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <label>Email</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Password</label>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <label>Konfirmasi Password</label>
                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="input-group mb-0">
                                <button type="submit" class="btn btn-login">
                                    DAFTAR
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h3 class="login__title">Daftar untuk menggunakan website Kampung Kue</h3>
                <p class="login__description"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, iusto? Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur fugit nemo dolore molestias non? Consequuntur recusandae ut rerum reprehenderit similique. </p>
                <div class="login__orther">
                    <p> <i class="icon-truck"></i>Order Kue Cepat & Berkualitas</p>
                    <p> <i class="icon-alarm2"></i>Pilih order kapan saja</p>
                    <p><i class="icon-star"></i>Banyak pilihan toko kue terbaik</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
