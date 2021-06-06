@extends('admin.layout')

@section('title')
    Edit Produk
@endsection

@section('content')
<div id="appCapsule">
    <div class="section mt-2">
        <a href="{{ route('admin.products.index') }}" class="btn btn-default mb-2">Kembali</a>
        <div class="card">
            <div class="card-header">
                Edit Produk
            </div>
            <div class="card-body">
                <div class="">
                    <form class="" action="{{ route('admin.products.update', $product->_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                        <div class="dropdown">
                            <div class="form-group boxed">
                                <label class="label">Unit Dagang</label>
                                <select name="merchant" class="form-control">
                                    <option value="">--- Pilih Unit Dagang ---</option>
                                    @foreach($merchants as $m)
                                    <option value="{{ $m->_id }}" {{ ($product->merchant == $m->_id) ? 'selected' : '' }}>{{ $m->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="dropdown">
                            <div class="form-group boxed">
                                <label class="label">Kategori Produk</label>
                                <select name="category" class="form-control" name="category">
                                    <option value="">--- Pilih Kategori ---</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->_id }}" {{ ((count($product->category) > 0) && ($product->category[0] == $cat->_id)) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Nama Produk</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Deskripsi Singkat</label>
                                <textarea cols="20" class="form-control" rows="5" name="desc">{{ $product->desc }}</textarea>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Deskripsi Lengkap</label>
                                <textarea cols="20" class="form-control" rows="10" name="desc_long">{{ $product->desc_long }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label">Harga Sebelum Diskon</label>
                                        <input type="text" class="form-control"  name="price[real_price]" value="{{ $product->price['real_price'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group boxed">
                                    <div class="input-wrapper">
                                        <label class="label">Harga Setelah Diskon</label>
                                        <input type="text" class="form-control"  name="price[discount_price]" value="{{ $product->price['discount_price'] }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group boxed">
                            <div class="input-wrapper">
                                <label class="label">Catatan Produk</label>
                                <input type="text" class="form-control"  name="note" value="{{ $product->note }}">
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