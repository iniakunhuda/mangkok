@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-3 pt-1">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="boxed">
                            <form action="{{ route('menu') }}" method="GET">
                                <select name="cat" id="" class="form-control mb-2">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->_id }}" {{ (isset($_GET['cat']) && ($_GET['cat'] == $cat->_id)) ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-2" name="q" value="{{ $_GET['q'] ?? '' }}" type="text" placeholder="Cari Makanan / Minuman">
                                <button class="btn btn-dark btn-block">Cari Menu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pt-1 mt-5">
        <h3>Hasil Pencarian
            @if(isset($_GET['q']) && ($_GET['q'] != ""))
                dari <span style="font-size:17px" class="text-muted">{{ $_GET['q'] }}</span>
            @endif
        </h3>
        <div class="row">
            @foreach($products as $prod)
            <div class="col-12 mt-2">
                <div class="card hand">
                    <div class="row">
                        <div class="col-12 col-md-3" onclick="window.location.href = '{{ route('menu.detail', [$prod->merchant]) }}'">
                            <img src="{{ ($prod->pict != "") ? $prod->pict : url('images/logo.png') }}" alt="{{ $prod->name }}" style="
                                object-fit: cover;
                                width: 100%;
                                height: 100%;">
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="card-body">
                                <a href="{{ route('menu.detail', [$prod->merchant]) }}">{{ $merchants[$prod->merchant]['name'] }}</a>
                                <h2 class="mb-0" onclick="window.location.href = '{{ route('menu.detail', [$prod->merchant]) }}'">{{ $prod->name }}</h2>
                                <small>@currency($prod->price)</small>
                                <p class="mt-2">
                                    {{ $prod->desc }}
                                </p>
                                
                                <small class="mt-2">Jumlah Pembelian</small>
                                <input class="form-control mb-2" name="product[{{$prod->_id}}]" value="1" type="number" min="1" />
                                <a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="addToCartProduct('{{$prod->_id}}', this)">Tambah ke pesanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($products) < 1)
            <div class="col-12 mt-2">
                <div class="card" style="height:300px">
                    <div class="card-body text-center pt-5">
                        <br>
                        <br>
                        <br>
                        Produk tidak ditemukan. Silahkan untuk mencari produk yang lain
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <div class="section">
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>

</div>
@endsection

@push('js')
<script>
    function addToCartProduct(id, that) {
        var qty = $(that).parent().find('input[type="number"]').val();
        addToCart(id, qty);
    }
</script>
@endpush