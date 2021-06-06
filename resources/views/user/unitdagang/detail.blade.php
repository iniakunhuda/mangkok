@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Detail Unit Dagang</a></li>
        </ul>
    </div>
</div>
<section class="section--vendorStore">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-4">
                <div class="store__location" style="margin:0">
                    <h5 class="widget__title">NAMA OWNER</h5>
                    <p>{{ $merchant->owner_name }}</p><br>
                    <h5 class="widget__title">PROFIL</h5>
                    <p>{{ $merchant->profile }}</p><br>
                    <h5 class="widget__title">LOKASI UNIT DAGANG</h5>
                    {!! $merchant->owner_location !!}
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="store__header">
                    <div class="row m-0">
                        @if($merchant->banner != "")
                        <div class="col-12 col-lg-12">
                            <img style="height:250px;width:100%;object-fit:cover" src="{{ url(\Config::get('website.url_photo').$merchant->banner) }}" alt>
                            <br><br>
                        </div>
                        @endif
                        <div class="col-12 col-lg-4 p-0">
                            @if($merchant->photo == "")
                                <div class="store__avatar"><img src="{{ url('img/logo.png') }}" alt></div>
                            @else
                                <div class="store__avatar"><img src="{{ url(\Config::get('website.url_photo').$merchant->photo) }}" alt></div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-8 p-0">
                            <div class="store__detail">
                                <h3 class="store__name">{{ $merchant->name }}</h3>
                                <p class="store__address">{{ $merchant->owner_address }}</p>
                                <p class="store__phone">{{ $merchant->whatsapp }}</p>
                                <div class="store__rating">
                                    <select class="rating-stars">
                                        <option value=""></option>
                                        <option value="1" {{ ($merchant->rating == 1) ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($merchant->rating == 2) ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($merchant->rating == 3) ? 'selected' : '' }}>3</option>
                                        <option value="4"  {{ ($merchant->rating == 4) ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($merchant->rating == 5) ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="store__social">
                                    @if($merchant->social_media['fb'] != "")
                                    <a class="icon_social facebook" target="_blank" href="{{ $merchant->social_media['fb'] }}"><i class="fa fa-facebook-f"></i></a>
                                    @endif
                                    @if($merchant->social_media['twitter'] != "")
                                    <a class="icon_social twitter" target="_blank" href="{{ $merchant->social_media['twitter'] }}"><i class="fa fa-twitter"></i></a>
                                    @endif
                                    @if($merchant->social_media['ig'] != "")
                                    <a class="icon_social instagram" target="_blank" href="{{ $merchant->social_media['ig'] }}"><i class="fa fa-instagram"></i></a>
                                    @endif
                                    @if($merchant->social_media['yt'] != "")
                                    <a class="icon_social youtube" target="_blank" href="{{ $merchant->social_media['yt'] }}"><i class="fa fa-youtube"></i></a>
                                    @endif
                                    @if($merchant->whatsapp != "")
                                    <a class="icon_social whatsapp" target="_blank" href="https://wa.me/{{ $merchant->whatsapp }}?text=Saya tertarik ingin pesan kue Anda"><i class="fa fa-whatsapp"></i></a>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="store__perpage" style="border-bottom: 1px solid #DDD;">
                    <p class="result"> <span>{{ count($products) }}</span>Produk</p>
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
                                    <p class="ps-product__type"><i class="icon-store"></i>{{ $merchant->name }}</p>
                                    <h5><a class="ps-product__name" href="{{ route('product.detail',[$pd->slug]) }}">{{ $pd->name }}</a></h5>
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
