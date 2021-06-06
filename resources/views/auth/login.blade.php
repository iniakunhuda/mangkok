@extends('layout', ['show_footer' => false])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Login</a></li>
        </ul>
    </div>
</div>
<section class="section--login">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="login__box">
                    <div class="login__header">
                        <h3 class="login__login"><a href="{{ url('login') }}">MASUK</a></h3>
                        <h3 class="login__register"><a href="{{ url('register') }}">DAFTAR</a></h3>
                    </div>
                    <div class="login__content">
                        
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="login__label">Masuk ke akun Anda.</div>
                            <label>Email</label><br>
                            <div class="input-group">
                                <input class="form-control" name="email" type="email" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label>Password</label><br>
                            <div class="input-group group-password">
                                <input class="form-control" name="password" type="password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                            <div class="input-group">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h3 class="login__title">Login untuk menggunakan website Kampung Kue</h3>
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
