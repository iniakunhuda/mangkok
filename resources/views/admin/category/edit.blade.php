@extends('admin.layout')

@section('title')
    Edit Kategori
@endsection

@section('content')
<div id="appCapsule">
    <div class="section mt-2">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-default mb-2">Kembali</a>
        <div class="card">
            <div class="card-header">
                Edit Kategori
            </div>
            <div class="card-body">
                <div class="">
                    <form action="{{ route('admin.categories.update', [$category->_id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Nama Kategori</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama" required value="{{ $category->name }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <button type="submit" name="submit" class="btn btn-primary btn-block btn-lg">SIMPAN</button>
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