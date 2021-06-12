@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="mt-2">Detail Pesanan Pembeli</h2>
                <p class="mb-0">Kode Transaksi : <strong>{{ $pesanan['code'] }}</strong></p>
                <p class="mb-0">Tanggal Pesan : {{ \Carbon\Carbon::parse($pesanan['date'])->format('d M Y') }}</p>
            </div>
        </div>
    </div>

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
          
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                <div class="card-body">
                    <div class="row">
                        @foreach($pesanan['products'] as $cart)
                        @php
                            $prod = $products[$cart['_id']];
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
                                                <div class="col-12 col-sm-4 text-center pt-3">
                                                    {{ $cart['qty'] }}
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
                        <strong>Nama Lengkap</strong>
                        <p class="mb-0">{{ $pesanan['buyer']['name'] }}</p>
                    </div>
                    <div class="form-group mb-2">
                        <strong>Telp</strong>
                        <p class="mb-0">{{ $pesanan['buyer']['telp'] }}</p>
                    </div>
                    <div class="form-group mb-2">
                        <strong>Alamat</strong>
                        <p class="mb-0">{{ $pesanan['buyer']['address'] }}</p>
                    </div>
                    <div class="form-group">
                        <strong>Catatan Pembelian</strong>
                        <p class="mb-0">{{ $pesanan['note'] }}</p>
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
              <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-bs-parent="#accordion">
                <div class="card-body">
                    <ol>
                        <li>Pembayaran dilakukan secara langsung ketika pedagang datang ke lokasi Anda</li>
                        <li>Total pembayaran sesuai dengan yang tertera pada aplikasi</li>
                        <li>Tunjukkan pesan ini untuk ketika membayar ke pedagang</li>
                        <li>Apabila Anda melakukan order fiktif, maka nomor Anda akan diblokir dari aplikasi Mangkok</li>
                    </ol>
                </div>
              </div>
            </div>
          </div>
    </div>

    <div class="section pt-1 mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Total Pembayaran</h2>
                        @currency($pesanan['total'])
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Status Transaksi</h2>
                        <form method="POST" action="{{ route('home.update_pesanan', [$pesanan['code']]) }}">
                            {{ csrf_field() }}
                            <select name="status" class="form-control">
                                <option value="">Ubah Status</option>
                                <option value="process" {{ ($pesanan['status'] == "process") ? 'selected' : '' }}>Terima Pesanan</option>
                                <option value="cancel" {{ ($pesanan['status'] == "cancel") ? 'selected' : '' }}>Tolak Pesanan</option>
                                <option value="done" {{ ($pesanan['status'] == "done") ? 'selected' : '' }}>Pesanan Selesai</option>
                                <option value="fiktif" {{ ($pesanan['status'] == "fiktif") ? 'selected' : '' }}>Pesanan Fiktif</option>
                            </select>
                            <button class="btn btn-primary btn-block mt-3">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
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
</script>
@endpush