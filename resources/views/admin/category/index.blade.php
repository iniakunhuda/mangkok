@extends('admin.layout')

@section('title')
    List Kategori
@endsection

@section('content')
<div id="appCapsule">
    <br>
    <br>
    <div class="section">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    List Kategori
                </div>
                <div class="float-end">
                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Buat Baru</a>
                </div>
            </div>
            <div class="card-body">
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
                        @foreach ($categories as $ct)
                            <tr class="data-row">
                                <th scope="row">{{ $loop->iteration }}  </th>
                                <td class="name"> {{ $ct->name }} </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', [$ct->_id]) }}" class="btn btn-primary mt-1 mb-1">Ubah</a>
                                    <a href="javascript:void(0);" 
                                        onclick="deleteRow('{{ $ct->id }}', '{{$ct->nama}}')" 
                                        class="btn btn-danger mt-1 mb-1"><i class="fa fa-trash"></i> Hapus</a>
                                    <form id="form_delete_{{$ct->id}}" action="{{ route('admin.categories.destroy', [$ct->id]) }}" method="POST">
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
});
</script>    
@endpush