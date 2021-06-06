@extends('layout', ['show_footer' => false])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Keranjang Belanja</a></li>
        </ul>
    </div>
</div>
<section class="section--shopping-cart">
    <div class="container shopping-container">
        <h2 class="page__title">Keranjang Belanja</h2>

        @if(count($carts) < 1)
        <div class="ps-breadcrumb">
            <div class="container">
                <ul class="ps-breadcrumb__list">
                    <li><a href="javascript:void(0);">Keranjang Belanja Anda Kosong</a></li>
                </ul>
            </div>
        </div>
        @endif

        @if(count($carts) > 0)
        <div class="shopping-cart__content">
            <div class="row m-0">
                <div class="col-12 col-lg-8">
                    <div class="shopping-cart__products">
                        <div class="shopping-cart__table">
                            <div class="shopping-cart-light">
                                <div class="shopping-cart-row">
                                    <div class="cart-product">Product</div>
                                    <div class="cart-price">Price</div>
                                    <div class="cart-quantity">Quantity</div>
                                    <div class="cart-total">Total</div>
                                    <div class="cart-action"> </div>
                                </div>
                            </div>
                            <div class="shopping-cart-body">
                                    @foreach($carts as $cart)
                                    <div class="shopping-cart-row">
                                        <div class="cart-product">
                                            <div class="ps-product--mini-cart"><a href="{{ route('product.detail', ['slug' => $cart['slug']]) }}">
                                                <img class="ps-product__thumbnail" src="{{ url(\Config::get('website.url_photo').$cart['image']) }}" alt="alt" /></a>
                                                <div class="ps-product__content">
                                                    <h5><a class="ps-product__name" href="#">{{ $cart['title'] }}</a></h5>
                                                    <p class="ps-product__soldby">Dijual oleh <span>{{ $cart['merchant'] }}</span></p>
                                                    <p class="ps-product__meta">Harga: <span class="ps-product__price">@currency($cart['price'])</span></p>
                                                    <div class="def-number-input number-input safari_only">
                                                        <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                        <input class="quantity" min="0" name="quantity" value="{{ $cart['qty'] }}" type="number" />
                                                        <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                                    </div><span class="ps-product__total">Total: <span>@currency($cart['price'])</span></span>
                                                </div>
                                                <div class="ps-product__remove"><i class="icon-trash2"></i></div>
                                            </div>
                                        </div>
                                        <div class="cart-price"><span class="ps-product__price">@currency($cart['price'])</span>
                                        </div>
                                        <div class="cart-quantity">
                                            <div class="def-number-input number-input safari_only">
                                                <button class="minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()"><i class="icon-minus"></i></button>
                                                <input class="quantity" min="0" name="quantity" value="{{ $cart['qty'] }}" type="number" />
                                                <button class="plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"><i class="icon-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="cart-total"> <span class="ps-product__total">@currency($cart['total'])</span>
                                        </div>
                                        <div class="cart-action"> <i class="icon-trash2"></i></div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="shopping-cart__step"><a class="clear-item" href="javascript:void(0);" onclick="destroyCart()">Hapus Keranjang</a>
                            <a class="button right" href="shop-view-grid.html"><i class="icon-sync"></i>Perbarui Keranjang</a>
                            <a class="button left" href="shop-view-grid.html"><i class="icon-arrow-left"></i>Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="shopping-cart__right">
                        <div class="shopping-cart__total">
                            <p class="shopping-cart__subtotal"><span>Subtotal</span><span class="price">@currency($cart['total'])</span></p>
                            <p class="shopping-cart__shipping">Biaya Pengiriman<br><span>Akan dihubungi oleh Admin</span></p>
                            <p class="shopping-cart__subtotal"><span><b>TOTAL</b></span><span class="price-total">@currency($cart['total'])</span></p>
                        </div><a class="btn shopping-cart__checkout" href="{{ route('cart.checkout') }}">Proses ke Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>
</section>
@endsection
