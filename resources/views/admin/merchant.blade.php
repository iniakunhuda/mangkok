@extends('admin.layouts.template')
@section('tittle','Pedagang - Kampung Kue Surabaya')
@section('content')
<body>
    <div class="section mt-2 mb-2">
        <h2 class="page-title">Pedagang</h2>
        <div class="wallet-card">
            <button type="button" class="btn btn-info me-1 mb-1" data-bs-toggle="modal" data-bs-target="#TambahMerchant">Tambah Pedagang</button>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">WhatsApp</th>
                                <th scope="col">Profil</th>
                                <th scope="col">Nama Owner</th>
                                <th scope="col">Alamat Owner</th>
                                <th scope="col">Lokasi Owner</th>
                                <th scope="col">Banner</th>
                                <th scope="col">Jam Buka</th>
                                <th scope="col">Spesialis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($merchants as $merchants)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td>{{ $merchants->name }}</td>
                                <td>{{ $merchants->code }}</td>
                                <td>{{ $merchants->whatsapp }}</td>
                                <td>{{ $merchants->profile }}</td>
                                <td>{{ $merchants->owner_name }}</td>
                                <td>{{ $merchants->owner_address }}</td>
                                <td>{{ $merchants->owner_location }}</td>
                                <td>{{ $merchants->banner }}</td>
                                <td>{{ $merchants->open_hour }}</td>
                                <td>{{ $merchants->specialist }}</td>

                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#UbahMerchant" data-id="{{ $merchants->_id }}" data-name="{{ $merchants->name }}" data-code="{{ $merchants->code }}" data-whatsapp="{{ $merchants->whatsapp }}" data-owner_name="{{ $merchants->owner_name }}" data-owner_address="{{ $merchants->owner_address }}" data-owner_location="{{ $merchants->owner_location }}" data-banner="{{ $merchants->banner }}" data-open_hour="{{ $merchants->open_hour }}" data-specialist="{{ $merchants->specialist }}" data-profile="{{ $merchants->profile }}">Ubah</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#HapusMerchant" data-id="{{ $merchants->_id }}">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection

@section('modal')
<div class="modal fade action-sheet" id="TambahMerchant" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Pedagang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="{{ route('admin.merchants.store')  }}" method="POST">
                            @csrf
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama</label>
                                        <input type="text" class="form-control"name="name" placeholder="Nama">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Kode</label>
                                        <input type="text" class="form-control" name="code" placeholder="Kode" >
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Whatsapp</label>
                                        <input type="number" class="form-control" name="whatsapp" placeholder="No. Whatsapp">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Profil</label>
                                        <input type="text" class="form-control" name="profile" placeholder="Profil">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama Owner</label>
                                        <input type="text" class="form-control" name="owner_name" placeholder="Nama Owner">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Alamat Owner</label>
                                        <input type="text" class="form-control" name="owner_address" placeholder="Alamat Owner">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Lokasi Owner</label>
                                        <input type="link" class="form-control" name="owner_location" placeholder="Lokasi Owner">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Banner</label>
                                        <input type="text" class="form-control" name="banner" placeholder="Banner">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Jam buka</label>
                                        <input type="text" class="form-control" name="open_hour" placeholder= "Jam Buka" >
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Spesialis</label>
                                        <input type="text" class="form-control" name="specialist" placeholder="Spesialis">
                                    </div>
                                </div>


                                <div class="form-group basic">
                                    <button type="submit" name ="submit" class="btn btn-primary btn-block btn-lg" >SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- UBAH -->
    <div class="modal fade action-sheet" id="UbahMerchant" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Pedagang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form class="" action="{{ route('admin.merchants.update', $merchants->_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama</label>
                                        <input type="hidden" name="_id" id="id">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Kode</label>
                                        <input type="text" class="form-control" name="code" id="code">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Whatsapp</label>
                                        <input type="number" class="form-control" name="whatsapp" id="whatsapp">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Profil</label>
                                        <input type=text" class="form-control" name="profile" id="profile">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama Owner</label>
                                        <input type="text" class="form-control" name="owner_name" id="owner_name">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Alamat Owner</label>
                                        <input type="text" class="form-control" name="owner_address" id="owner_address">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Lokasi Owner</label>
                                        <input type="link" class="form-control" name="owner_location" id="owner_location">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Banner</label>
                                        <input type="text" class="form-control" name="banner" id="banner">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Jam buka</label>
                                        <input type="text" class="form-control" name="open_hour" id="open_hour">
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Spesialis</label>
                                        <input type="text" class="form-control" name="specialist" id="specialist">
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <button type="submit" name ="submit" class="btn btn-primary btn-block btn-lg" >SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade action-sheet" id="HapusMerchant" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus Pedagang</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="{{ route('admin.merchants.destroy', $merchants->_id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <input type="hidden" name="_id" id="id">
                                        <p>Apakah anda yakin menghapus Pedagang <b><span id="#"></span></b> ?</p>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <button type="submit" name ="submit" class="btn btn-danger btn-block btn-sm" >YA</button>
                                    <button type="button" name ="#" id="" class="btn btn-default btn-block btn-sm" data-bs-dismiss="modal">TIDAK</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"  crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
@endsection
