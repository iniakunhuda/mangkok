@extends('layout', ['show_footer' => false ])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">List Produk</a></li>
        </ul>
    </div>
</div>
<section class="section--vendorStore mb-5">
    <div class="container">
        <h2 class="about__title">List Produk</h2><br><br>
        <div class="row">
            {{-- <div class="col-12 col-lg-4">
                <div class="widget--block">
                    <h5 class="widget__title">SEMUA KATEGORI</h5>
                    <ul class="menu--mobile widget__list">
                        @foreach($categories as $ct)
                        <li class="category-item" data-value="option">
                            <a href="javascript:void(0);">
                            {{ $ct->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div> --}}
            <div class="col-12 col-lg-12">
                <div class="viewtype--block">
                    <div class="viewtype__sortby">
                        <div class="select">
                            <select class="single-select2" name="state">
                                <option value="popularity">Urutkan rating terbaik</option>
                                <option value="price">Urutkan harga terendah</option>
                                <option value="sale">Urutkan harga tertinggi</option>
                            </select>
                        </div>
                    </div>
                    <div class="viewtype__select"> <span class="text">View: </span>
                        <div class="select">
                            <select class="single-select2" name="state">
                                <option value="25">25 produk</option>
                                <option value="12">12 produk</option>
                                <option value="5">5 produk</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="store__product">
                    <div class="row m-0">
                        @foreach($products as $pd)
                        <div class="col-6 col-md-4 col-lg-3 p-0">
                            <div class="ps-product--standard">
                                <a href="{{ route('product.detail',[$pd->slug]) }}">
                                    @if(count($pd->images) > 0)
                                    <img class="ps-product__thumbnail" src="{{ url(\Config::get('website.url_photo').$pd->images[0]['url']) }}" alt="alt" />
                                    @else
                                    <img class="ps-product__thumbnail" src="{{ url('img/logo.png') }}" alt="alt" />
                                    @endif
                                </a>
                                <div class="ps-product__content">
                                    <p class="ps-product__type"><i class="icon-store"></i>{{ $merchants[$pd->merchant]['name'] }}</p>
                                    <h5><a class="ps-product__name" href="{{ route('product.detail',[$pd->slug]) }}">{{ $pd->name }}</a></h5>
                                    {{-- <p class="ps-product__unit">250g</p> --}}
                                    <div class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value=""></option>
                                            <option value="1" {{ ($pd->rating == 1) ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ ($pd->rating == 2) ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ ($pd->rating == 3) ? 'selected' : '' }}>3</option>
                                            <option value="4"  {{ ($pd->rating == 4) ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ ($pd->rating == 5) ? 'selected' : '' }}>5</option>
                                        </select><span>({{ count($pd->reviews) ?? 0 }})</span>
                                    </div>
                                    <p class="ps-product-price-block">
                                        <span class="ps-product__sale">
                                            @currency($pd->price['discount_price'])
                                        </span>
                                        @if($pd->price['real_price'] != $pd->price['discount_price'])
                                        <small class="text-muted"><del>
                                            @currency($pd->price['real_price'])
                                        </del></small>
                                        @endif
                                    </p>
                                </div>
                                <div class="ps-product__footer">
                                    <div class="def-number-input number-input safari_only">
                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                        <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                    </div>
                                    <button class="ps-product__addcart mt-3">
                                        <i class="icon-cart"></i>Tambah ke Keranjang</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
@endsection
