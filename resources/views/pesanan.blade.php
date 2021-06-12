@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="mt-2">Pesanan Saya</h2>
            </div>
        </div>
    </div>

    @if(count($carts) < 1)
    <div class="section pt-1">
        <div class="card" style="height:300px">
            <div class="card-body text-center pt-5">
                <br>
                <br>
                <br>
                Pesanan Anda tidak ditemukan. Silahkan untuk mencari produk terlebih dahulu
            </div>
        </div>
    </div>
    @endif

    <form id="frmPost" action="{{ route('checkout') }}" method="POST">

    @if(count($carts) > 0)
    <div class="section pt-1 mt-5">
        <div id="accordion">
            <div class="card" style="border-radius: 0;">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button type="button" class="btn btn-link" data-bs-toggle="collapse" href="#collapseOne" role="button" aria-expanded="false" aria-controls="collapseOne">
                    Keranjang Belanja
                  </button>
                </h5>
              </div>
          
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        @foreach($carts as $cart)
                        @php
                            $prod = $prods[$cart['id']];
                        @endphp
                        <div class="col-12 mt-2">
                            <div class="card hand">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <a href="{{ route('menu.detail', [$prod['merchant']]) }}">{{ $merchants[$prod['merchant']]['name'] }}</a>
                                                    <h3 class="mb-0">{{ $prod['name'] }}</h3>
                                                    <small>@currency($cart['price'])</small>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <input class="form-control mb-2" name="product[{{$prod['_id']}}]" value="{{ $cart['qty'] }}" type="number" min="1" />
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-block" onclick="updateQtyProduct('{{$prod['_id']}}', this)">Update</a>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-block" onclick="removeFromCart('{{$prod['_id']}}')">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 text-center pt-3">
                                                    @php
                                                        $subtotal = $cart['qty'] * $cart['price'];    
                                                    @endphp
                                                    @currency($subtotal)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
              </div>
            </div>


            <div class="card" style="border-radius: 0;">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">
                    Biodata Pembeli
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                <div class="card-body">
                    <div class="form-group mb-2">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" placeholder="Contoh: Kevin Aprilio" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Telp</label>
                        <input type="text" name="telp" placeholder="Contoh: 0856xxxxx" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Alamat</label>
                        <input type="text" name="alamat" placeholder="Contoh: Nama Jalan, Nomor Rumah, Kota" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Catatan Pembelian</label>
                        <textarea name="catatan" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
              </div>
            </div>


            <div class="card" style="border-radius: 0;">
              <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                  <button type="button" class="btn btn-link collapsed" data-bs-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                    Pembayaran
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                <div class="card-body">
                    <ol>
                        <li>Pembayaran dilakukan secara langsung ketika pedagang datang ke lokasi Anda</li>
                        <li>Total pembayaran sesuai dengan yang tertera pada aplikasi</li>
                        <li>Transaksi yang telah dilakukan tidak dapat dibatalkan dalam aplikasi, kecuali Anda dan pedagang setuju untuk membatalkan.</li>
                        <li>Apabila Anda melakukan order fiktif, maka nomor Anda akan diblokir dari aplikasi Mangkok</li>
                    </ol>
                </div>
              </div>
            </div>
          </div>
    </div>

    <div class="section pt-1 mt-5">
        <div class="card">
            <div class="card-body">
                <h2>Total Pembayaran</h2>
                <span class="total__bayar">
                </span>
            </div>
        </div>
    </div>

    <div class="section pt-1 mt-5">
        {{ csrf_field() }}
        <button type="button" onclick="submitCart()" class="btn btn-primary btn-lg btn-block mb-2">Checkout</button>
        <button onclick="destroyCart()" type="button" class="btn btn-danger btn-lg btn-block">Batalkan Pesanan</button>
    </div>
    @endif

    </form>


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
function updateQtyProduct(id, that) {
    var qty = $(that).parent().parent().parent().find('input[type="number"]').val();
    changeQtyCart(id, qty);
}

function submitCart() {
    let url = $('#frmPost').attr('action');
    axios.post(url, $('#frmPost').serialize())
    .then(function (response) {
        showAlert(response);

        let data = response.data;
        let history = localStorage.getItem('history_cart');
        history = ((history != undefined) && (history.length > 0)) ? JSON.parse(history) : [];
        history.push({
            _id: data.data._id,
            code: data.data.code
        })

        localStorage.setItem('history_cart', JSON.stringify(history));
        window.location.href = "/";
    })
    .catch(function (error) {
        showAlert(error);
    });  
}
</script>
@endpush