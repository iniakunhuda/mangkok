@extends('admin.layout')

@section('title')
    Edit Unit Dagang
@endsection

@section('content')
<div id="appCapsule">
    <div class="section mt-2">
        <a href="{{ route('admin.merchants.index') }}" class="btn btn-default mb-2">Kembali</a>
        <div class="card">
            <div class="card-header">
                Edit Unit Dagang
            </div>
            <div class="card-body">
                <div class="">
                    <form class="" action="{{ route('admin.merchants.update', $merchant->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="form-group boxed">
                            <h3>Detail Owner</h3>
                            <hr>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Nama Owner</label>
                                <input type="text" class="form-control" name="owner_name" placeholder="Nama Owner" value="{{ $merchant->owner_name }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Alamat Owner</label>
                                <input type="text" class="form-control" name="owner_address" placeholder="Alamat Owner" value="{{ $merchant->owner_address }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Lokasi Owner</label>
                                <input type="link" class="form-control" name="owner_location" placeholder="Lokasi Owner" value="{{ $merchant->owner_location }}">
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
                                <input type="text" class="form-control"name="name" placeholder="Nama" value="{{ $merchant->name }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Kode</label>
                                <input type="text" class="form-control" name="code" placeholder="Kode" value="{{ $merchant->code }}" readonly>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Whatsapp</label>
                                <input type="text" class="form-control" name="whatsapp" placeholder="No. Whatsapp" value="{{ $merchant->whatsapp }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Profil</label>
                                <input type="text" class="form-control" name="profile" placeholder="Profil" value="{{ $merchant->profile }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Banner</label>
                                @if($merchant->banner != "")
                                    <img class="img-fluid" src="{{ url(\Config::get('website.url_photo').$merchant->banner) }}" alt=""><br><br>
                                @endif
                                <input type="file" name="banner" placeholder="Banner">
                                <input type="hidden" class="form-control" name="banner_old" value="{{ $merchant->banner }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Photo</label>
                                @if($merchant->photo != "")
                                    <img class="img-fluid" src="{{ url(\Config::get('website.url_photo').$merchant->photo) }}" alt=""><br><br>
                                @endif
                                <input type="file" name="photo" placeholder="Photo">
                                <input type="hidden" class="form-control" name="photo_old" value="{{ $merchant->photo }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Jam buka</label>
                                <input type="text" class="form-control" name="open_hour" placeholder= "Jam Buka" value="{{ $merchant->open_hour }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Spesialis</label>
                                <input type="text" class="form-control" name="specialist" placeholder="Spesialis" value="{{ $merchant->specialist }}">
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
                                <input type="text" class="form-control" name="fb" placeholder="Facebook" value="{{ $merchant->social_media['fb'] }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Twitter</label>
                                <input type="text" class="form-control" name="twitter" placeholder="Twitter" value="{{ $merchant->social_media['twitter'] }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Instagram</label>
                                <input type="text" class="form-control" name="ig" placeholder="Instagram" value="{{ $merchant->social_media['ig'] }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Youtube</label>
                                <input type="text" class="form-control" name="yt" placeholder="Youtube" value="{{ $merchant->social_media['yt'] }}">
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