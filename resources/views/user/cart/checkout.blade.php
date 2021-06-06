@extends('layout', ['show_footer' => false])

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Checkout</a></li>
        </ul>
    </div>
</div>
<section class="section--checkout">
    <div class="container">
        <h2 class="page__title">Checkout</h2>
        <div class="checkout__content">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h3 class="checkout__title">Detail Penerima</h3>
                    <div class="checkout__form">
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-lg-12 form-group--block">
                                    <label>Nama Lengkap: <span>*</span></label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Alamat (isi <strong>Ambil di tempat</strong> jika ingin mengambil langsung di lokasi): <span>*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Kodepos (optional)</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Kota: <span>*</span></label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Nomor Whatsapp (Nomor Dapat Dihubungi): <span>*</span></label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Catatan Pembelian (optional)</label>
                                    <textarea class="form-control" placeholder=""></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <h3 class="checkout__title">Keranjang Belanja Saya</h3>
                    <div class="checkout__products">
                        <div class="row">
                            <div class="col-8">
                                <div class="checkout__label">Produk</div>
                            </div>
                            <div class="col-4 text-right">
                                <div class="checkout__label">Total</div>
                            </div>
                        </div>
                        <div class="checkout__list">
                            @foreach($carts as $cart)
                            <div class="checkout__product__item">
                                <div class="checkout-product">
                                    <div class="product__name">{{ $cart['title'] }}<span>(x{{ $cart['qty'] }})</span></div>
                                    <div class="product__unit">500g</div>
                                </div>
                                <div class="checkout-price">@currency($cart['total'])</div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="checkout__label">Subtotal</div>
                            </div>
                            <div class="col-4 text-right">
                                <div class="checkout__label">@currency($cart['total'])</div>
                            </div>
                        </div>
                        <hr>
                        <div class="checkout__label">Ongkos Kirim</div>
                        <p>Tunggu Konfirmasi dari Admin (akan dichat melalui whatsapp). Ongkos kirim ditanggung oleh Pembeli</p>
                        <div class="row">
                            <div class="col-8">
                                <div class="checkout__total">Total</div>
                            </div>
                            <div class="col-4 text-right">
                                <div class="checkout__money">@currency($cart['total'])</div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout__payment">
                        <div class="checkout__label mb-3">Pilih Pembayaran</div>
                        <div class="form-group--block">
                            <input class="form-check-input" type="checkbox" id="checkboxBank" value="bank">
                            <label class="label-checkbox" for="checkboxBank"><b class="text-heading">Kampung Kue Surabaya - 029310931238 (BCA)</b></label>
                        </div>
                    </div>
                    <div class="form-group--block">
                        <input class="form-check-input" type="checkbox" id="checkboxAgree" value="agree">
                    </div><a class="checkout__order" href="order.html">Pesan Preorder Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
