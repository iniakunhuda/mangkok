@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5 text-center">
        <h1>Login Pedagang</h1>
        <h4>Silahkan masukkan detail akun Anda</h4>
    </div>
    <div class="section mb-5 p-2">

        <form action="" method="post">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body pb-1">
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="telp">Nomor Telp</label>
                            <input type="text" autocomplete="new-password" class="form-control" name="telp" id="telp" placeholder="+628xxx">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" for="password1">Password</label>
                            <input type="password" class="form-control" name="password" id="password1" autocomplete="new-password"
                                placeholder="Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                </div>
            </div>


            @if(\Session::get('success'))
                <div class="alert mt-3 alert-success" role="alert">
                    {{ \Session::get('success') }}
                </div>
            @endif
            @if(\Session::get('error'))
                <div class="alert mt-3 alert-danger" role="alert">
                    {{ \Session::get('error') }}
                </div>
            @endif 

            <div class="mt-5">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Masuk ke Platform Pedagang</button>
            </div>

        </form>
    </div>

</div>
@endsection