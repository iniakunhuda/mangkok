@extends('admin.layouts.template')
@section('tittle','Kategori - Kampung Kue Surabaya')
@section('content')
<body>
<div class="section mt-2 mb-2">
    <h2 class="page-title">Kategori</h2>
    <div class="wallet-card">
        <button type="button" class="btn btn-info me-1 mb-1" data-bs-toggle="modal" data-bs-target="#TambahKategori">Tambah Kategori</button>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $categories)
                            <tr class="data-row">
                                <th scope="row">{{ $loop->iteration }}  </th>
                                <td class="name"> {{ $categories->name }} </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#UbahKategori" id="edit-item" data-id="{{ $categories->_id }}" data-name="{{ $categories->name }}">Ubah</button>
                                    <button class="btn btn-outline-danger btn-sm me-1 mb-1" data-bs-toggle="modal" data-bs-target="#HapusKategori" data-id="{{ $categories->_id }}">Hapus</button>
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
<form action="{{ route('admin.categories.store') }}" method="POST">
@csrf
<div class="modal fade action-sheet" id="TambahKategori" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama Kategori</label>
                                        <input type="text" class="form-control"  name="name" placeholder="Nama">
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
</form>

        <div class="modal fade action-sheet" id="UbahKategori" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Kategori</h5>
                    </div>
                    <div class="modal-body">
                            <form class="" action=" {{ route('admin.categories.update', $categories->_id) }} " method="POST">
                            @csrf
                            @method('PUT')
                        <div class="action-sheet-content">
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label">Nama Kategori</label>
                                        <input type="hidden" name="_id" id="id">
                                        <input type="text" class="form-control" name="name" id="name">
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <button type="submit" name ="submit" class="btn btn-primary btn-block btn-lg" >SUBMIT</button>
                                </div>
                        </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade action-sheet" id="HapusKategori" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus Kategori</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form action="{{ route('admin.categories.destroy', $categories->_id) }} " method="POST">
                            @csrf
                            @method('DELETE')
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <input type="hidden" name="_id" id="id">
                                        <p>Apakah anda yakin menghapus Kategori <b><span id="#"></span></b> ?</p>
                                    </div>
                                </div>
                                <div class="form-group basic">
                                    <button type="submit" name ="submit" id="" class="btn btn-danger btn-block btn-sm" >YA</button>
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
