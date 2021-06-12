@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="mt-2">Riwayat Pesanan Pembeli</h2>
            </div>
        </div>
    </div>


    @if(count($trans) < 1)
    <div class="section pt-1">
        <div class="card" style="height:300px">
            <div class="card-body text-center pt-5">
                <br>
                <br>
                <br>
                Riwayat Pesanan Pembeli tidak ditemukan
            </div>
        </div>
    </div>
    @endif

    @if(count($trans) > 0)
    <div class="section pt-1">
        <div class="row">
            <div class="col-12">
                @foreach($trans as $t)
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h3 class="mb-1">
                                    <a href="{{ route('home.detail_riwayat_pesanan', [$t['code']]) }}">Transaksi Nomor {{ $t['code'] }}</a>
                                </h3>
                                @if($t['status'] == "waiting")
                                    <div style="border-radius: 0" class="badge bg-warning">Menunggu Konfirmasi Pedagang</div>
                                @elseif($t['status'] == "process")
                                    <div style="border-radius: 0" class="badge bg-primary">Menerima Pesanan. Kunjungi lokasi pembeli</div>
                                @elseif($t['status'] == "done")
                                    <div style="border-radius: 0" class="badge bg-primary">Pesanan Selesai</div>
                                @else
                                    <div style="border-radius: 0" class="badge bg-danger">Pesanan Dibatalkan</div>
                                @endif
                            </div>
                            <div class="col-12 col-md-6 text-start text-md-end">
                                <h4>@currency($t['total'])</h4>
                            </div>
                            <div class="col-12 mt-1">
                                <p class="merchant mb-0">{{ $t['buyer']['name'] }}</p>
                                <p class="date mb-0">{{ \Carbon\Carbon::parse($t['date'])->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif


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