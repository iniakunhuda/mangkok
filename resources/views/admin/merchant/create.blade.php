@extends('admin.layout')

@section('title')
    Tambah Unit Dagang
@endsection

@section('content')
<div id="appCapsule">
    <div class="section mt-2">
        <a href="{{ route('admin.merchants.index') }}" class="btn btn-default mb-2">Kembali</a>
        <div class="card">
            <div class="card-header">
                Tambah Unit Dagang
            </div>
            <div class="card-body">
                <div class="">
                    <form class="" action="{{ route('admin.merchants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                        <div class="form-group boxed">
                            <h3>Detail Owner</h3>
                            <hr>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Nama Owner</label>
                                <input type="text" class="form-control" name="owner_name" placeholder="Nama Owner">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Alamat Owner</label>
                                <input type="text" class="form-control" name="owner_address" placeholder="Alamat Owner">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Lokasi Owner</label>
                                <input type="link" class="form-control" name="owner_location" placeholder="Lokasi Owner">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <br>
                            <h3>Detail Unit Dagang</h3>
                            <hr>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Nama</label>
                                <input type="text" class="form-control"name="name" placeholder="Nama">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Kode</label>
                                <input type="text" class="form-control" name="code" placeholder="Kode">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" placeholder="No. Whatsapp">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Profil</label>
                                <input type="text" class="form-control" name="profile" placeholder="Profil">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Banner</label>
                                <input type="file" name="banner" placeholder="Banner">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Photo</label>
                                <input type="file" name="photo" placeholder="Photo">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Jam buka</label>
                                <input type="text" class="form-control" name="open_hour" placeholder= "Jam Buka">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Spesialis</label>
                                <input type="text" class="form-control" name="specialist" placeholder="Spesialis">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <br>
                            <h3>Sosial Media</h3>
                            <hr>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Facebook</label>
                                <input type="text" class="form-control" name="social_media[fb]" placeholder="Facebook">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Twitter</label>
                                <input type="text" class="form-control" name="social_media[twitter]" placeholder="Twitter">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Instagram</label>
                                <input type="text" class="form-control" name="social_media[ig]" placeholder="Instagram">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Youtube</label>
                                <input type="text" class="form-control" name="social_media[yt]" placeholder="Youtube">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <button type="submit" name ="submit" class="btn btn-primary btn-block btn-lg" >SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
@endsection

@push('js')
<script>
</script>    
@endpush