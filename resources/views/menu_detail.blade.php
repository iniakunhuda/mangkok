@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">


    @if($merchant->banner != "")
    <div class="section pt-1 mt-5" style="padding: 0;">
        <img style="margin-top: -50px;" class="img-fluid" src="{{ $merchant->banner }}" alt="">
    </div>
    @endif

    <div class="section mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="mt-2">{{ $merchant->name }}</h1>
                <p>{{ $merchant->desc }}</p>
                
                <select class="rating-stars">
                    <option value=""></option>
                    <option value="1" {{ ($merchant->rating == 1) ? 'selected' : '' }}>1</option>
                    <option value="2" {{ ($merchant->rating == 2) ? 'selected' : '' }}>2</option>
                    <option value="3" {{ ($merchant->rating == 3) ? 'selected' : '' }}>3</option>
                    <option value="4"  {{ ($merchant->rating == 4) ? 'selected' : '' }}>4</option>
                    <option value="5" {{ ($merchant->rating == 5) ? 'selected' : '' }}>5</option>
                </select>
            </div>
        </div>
    </div>

    <div class="section pt-1 mt-5">
        <h3>Produk</h3>
        <div class="row">
            @foreach($products as $prod)
            <div class="col-12 mt-2">
                <div class="card hand">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <img src="{{ ($prod->pict != "") ? $prod->pict : url('images/logo.png') }}" alt="{{ $prod->name }}" style="
                                object-fit: cover;
                                width: 100%;
                                height: 100%;">
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="card-body">
                                <a href="{{ route('menu.detail', [$prod->merchant]) }}">{{ $merchants[$prod->merchant]['name'] }}</a>
                                <h3 class="mb-0">{{ $prod->name }}</h3>
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