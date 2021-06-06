@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Detail Produk</a></li>
        </ul>
    </div>
</div>
<section class="section--product-type">
    <div class="container">
        <div class="product__header">
            <h3 class="product__name">{{ $product->name }}</h3>
            <div class="row">
                <div class="col-12 col-lg-7 product__code">
                    <select class="rating-stars">
                        <option value=""></option>
                        <option value="1" {{ ($product->rating == 1) ? 'selected' : '' }}>1</option>
                        <option value="2" {{ ($product->rating == 2) ? 'selected' : '' }}>2</option>
                        <option value="3" {{ ($product->rating == 3) ? 'selected' : '' }}>3</option>
                        <option value="4"  {{ ($product->rating == 4) ? 'selected' : '' }}>4</option>
                        <option value="5" {{ ($product->rating == 5) ? 'selected' : '' }}>5</option>
                    </select>
                    <span class="product__review">{{ count($product->reviews) }} Review</span>
                </div>
                {{-- <div class="col-12 col-lg-5">
                    <div class="ps-social--share"><a class="ps-social__icon facebook" href="#"><i class="fa fa-thumbs-up"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon facebook" href="#"><i class="fa fa-facebook-square"></i><span>Like</span><span class="ps-social__number">0</span></a><a class="ps-social__icon twitter" href="#"><i class="fa fa-twitter"></i><span>Like</span></a><a class="ps-social__icon" href="#"><i class="fa fa-plus-square"></i><span>Like</span></a></div>
                </div> --}}
            </div>
        </div>
        <div class="product__detail">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="ps-product--detail">
                        <div class="row">
                            <div class="col-12 col-lg-6 popup-gallery">
                                @if(count($product->images) > 0)
                                <div class="ps-product__variants">
                                    <div class="ps-product__gallery">
                                        @foreach($product->images as $img)
                                        <div class="ps-gallery__item">
                                            <a class="image-link" title="{{ $img['title'] }}" href="{{ url(\Config::get('website.url_photo').$img['url']) }}">
                                                <img src="{{ url(\Config::get('website.url_photo').$img['url']) }}" alt="alt" />
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="ps-product__thumbnail">
                                        <div class="ps-product__zoom">
                                            <a class="image-link" title="{{ $img['title'] }}" href="{{ url(\Config::get('website.url_photo').$img['url']) }}">
                                                <img id="ps-product-zoom" src="{{ url(\Config::get('website.url_photo').$product->images[0]['url']) }}" alt="alt" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="ps-product__variants">
                                    <div class="ps-product__thumbnail">
                                        <div class="ps-product__zoom"><img id="ps-product-zoom" src="{{ url('img/logo.png') }}" alt="alt" />
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="ps-product__sale">
                                    <span class="price-sale">@currency($product->price['discount_price'])</span>

                                    @if($product->price['real_price'] != $product->price['discount_price'])
                                    <span class="price">@currency($product->price['real_price'])</span>
                                    @endif
                                </div>
                                <div class="ps-product__info">
                                    <ul class="ps-list--rectangle">
                                        <li> Unit Dagang: {{ $merchant->name }}</li>
                                        <li> Note : {{ $product->note ?? '-' }}</li>
                                    </ul>
                                </div>
                                <div class="ps-product__avai alert__success">Preorder: <span>Sesuai Pesanan</span>
                                </div>
                                <div class="ps-product__shopping">
                                    <div class="ps-product__quantity">
                                        <label>Jumlah: </label>
                                        <div class="def-number-input number-input safari_only">
                                            <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                            <input class="quantity" min="0" name="quantity" value="1" type="number" />
                                            <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    <a class="ps-product__addcart ps-button" onclick="addToCart('{{$product->_id}}', '1')"><i class="icon-cart"></i>Tambah Ke Keranjang</a>
                                    {{-- <a class="ps-product__icon" href="wishlist.html"><i class="icon-heart"></i></a> --}}
                                    {{-- <a class="ps-product__icon"><i class="icon-repeat"></i></a> --}}
                                </div>
                                <div class="ps-product__footer">
                                    <a class="ps-product__shop" href="shop-view-grid.html">
                                        <i class="icon-store"></i><span>Store</span>
                                    </a>
                                    <a class="ps-product__addcart ps-button"><i class="icon-cart"></i>Tambah Ke Keranjang</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="ps-product--extention">
                        <div class="extention__block extention__contact">
                            <p> <span class="text-black">Tanya produk via whatsapp</span></p>
                            <h3><a href="{{ route('merchant.detail', [$merchant->code]) }}">{{ $merchant->name }}</a></h3>
                            <h4 class="extention__phone">{{ $merchant->whatsapp }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__content">
            <ul class="nav nav-pills" role="tablist" id="productTabDetail">
                <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description-content" role="tab" aria-controls="description-content" aria-selected="true">Deskripsi</a></li>
                <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews-content" role="tab" aria-controls="reviews-content" aria-selected="false">Reviews({{ count($product->reviews) ?? 0 }})</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="description-content" role="tabpanel" aria-labelledby="description-tab">
                    <p class="block-content">
                        {!! $product->desc_long !!}
                    </p>
                </div>
                <div class="tab-pane fade" id="reviews-content" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="ps-product--reviews">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="review__box">
                                    <div style="
                                    text-align: center;
                                    margin-top: 10%;">
                                        <div class="product__rate">{{ $product->rating }}</div>
                                        <select class="rating-stars">
                                            <option value=""></option>
                                            <option value="1" {{ ($product->rating == 1) ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ ($product->rating == 2) ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ ($product->rating == 3) ? 'selected' : '' }}>3</option>
                                            <option value="4"  {{ ($product->rating == 4) ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ ($product->rating == 5) ? 'selected' : '' }}>5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="review__title">Kirim review</div>
                                <p class="mb-0">Nomor whatsapp tidak akan dipublish. Inputan wajib diisi <span class="text-danger">*</span></p>
                                <form>
                                    <div class="form-row">
                                        <div class="col-12 form-group--block">
                                            <div class="input__rating">
                                                <label>Rating Anda: <span>*</span></label>
                                                <select class="rating-stars">
                                                    <option value=""></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 form-group--block">
                                            <label>Review: <span>*</span></label>
                                            <textarea class="form-control"></textarea>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>Nama: <span>*</span></label>
                                            <input class="form-control" type="text" required>
                                        </div>
                                        <div class="col-12 col-lg-6 form-group--block">
                                            <label>Whatsapp:</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="col-12 form-group--block">
                                            <button class="btn ps-button ps-btn-submit">Kirim Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="ps--comments">
                            <h5 class="comment__title">{{ count($product->reviews) }} Komentar</h5>
                            @if(count($product->reviews) > 0)
                            <ul class="comment__list">
                                @foreach($product->reviews as $rv)
                                <li class="comment__item">
                                    <div class="item__avatar"><img src="{{ url('img/avatar.jpg') }}" alt="alt" /></div>
                                    <div class="item__content">
                                        <div class="item__name">{{ $rv->name }}</div>
                                        <div class="item__date">- {{ \Carbon\Carbon::parse($rv->date)->format('d M Y') }}</div>
                                        <div class="item__rate">
                                            <select class="rating-stars">
                                            <option value=""></option>
                                                <option value="1" {{ ($product->rating == 1) ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ ($product->rating == 2) ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ ($product->rating == 3) ? 'selected' : '' }}>3</option>
                                                <option value="4"  {{ ($product->rating == 4) ? 'selected' : '' }}>4</option>
                                                <option value="5" {{ ($product->rating == 5) ? 'selected' : '' }}>5</option>
                                            </select>
                                        </div>
                                        <p class="item__des">
                                            {{ $rv->comment }}
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ url('plugins/magnific-popup/magnific-popup.css') }}">
@endpush

@push('js')
    <script src="{{ url('plugins/magnific-popup/magnific-popup.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
            type:'image',
            delegate: 'a',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1]
            },
        });
      });
    </script>
@endpush