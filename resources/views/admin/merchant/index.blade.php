@extends('admin.layout')

@section('title')
    List Unit Dagang
@endsection

@section('content')
<div id="appCapsule">
    <br>
    <br>
    <div class="section">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    List Unit Dagang
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.merchants.create') }}" class="btn btn-primary">Buat Baru</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Owner</th>
                                <th scope="col">Alamat Owner</th>
                                <th scope="col">WhatsApp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $m)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }} </th>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->code }}</td>
                                <td>{{ $m->owner_name }}</td>
                                <td>{{ $m->owner_address }}</td>
                                <td>{{ $m->whatsapp }}</td>
                                <td>
                                    <a href="{{ route('admin.merchants.edit', [$m->_id]) }}" class="btn btn-primary mt-1 mb-1">Ubah</a>
                                    <a href="javascript:void(0);" 
                                        onclick="deleteRow('{{ $m->id }}', '{{$m->nama}}')" 
                                        class="btn btn-danger mt-1 mb-1"><i class="fa fa-trash"></i> Hapus</a>
                                    <form id="form_delete_{{$m->id}}" action="{{ route('admin.merchants.destroy', [$m->id]) }}" method="POST">
                                    {{ csrf_field() }}  
                                    <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('js')
<script>
$(document).ready( function () {
    $('table').DataTable();
} );
</script>    
@endpush