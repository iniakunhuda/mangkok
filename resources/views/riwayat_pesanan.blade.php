@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="mt-2">Riwayat Pesanan Saya</h2>
            </div>
        </div>
    </div>

    <div id="notfound" class="section pt-1 hidden">
        <div class="card" style="height:300px">
            <div class="card-body text-center pt-5">
                <br>
                <br>
                <br>
                Riwayat Pesanan Anda tidak ditemukan. Silahkan untuk membeli produk terlebih dahulu
            </div>
        </div>
    </div>

    <div id="list_riwayat" class="section pt-1 hidden">
        <div class="row">
            <div class="col-12">
                <div id="template__riwayat">
                </div>
            </div>
        </div>
    </div>

    <div id="div__riwayat" class="hidden">
        <div class="card mt-2">
            <div class="card-body">
                <h3>
                    <a href=""></a>
                </h3>
                <p class="merchant mb-0"></p>
                <p class="date mb-0"></p>
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
function getRiwayat() {
    let data = localStorage.getItem('history_cart');
    if((data == undefined) || (data.length < 1)) {
        $('#notfound').removeClass('hidden');
        return;
    }

    $('#notfound').addClass('hidden');

    let url = API_URL + "cart/riwayat_pesanan";
    axios.post(url, {data: data})
        .then(function (response) {
            let data = (response.data.data != undefined) ? response.data.data : [];

            data.forEach((r) => {
                let div = $('#div__riwayat > .card').clone();
                div.find('h3').find('a').text("Transaksi Nomor " + r.code)
                div.find('h3').find('a').attr("href", "/riwayat_pesanan/detail/" + r.code)
                div.find('.merchant').text("Merchant : " + r.merchant.name)
                div.find('.date').text( " Tanggal Transaksi : " + r.order_date)
                div.appendTo('#template__riwayat');
                $('#list_riwayat').removeClass('hidden');
            });
        })
        .catch(function (error) {
            console.log(error);
            showAlert(error);
        });  
}
getRiwayat();
</script>
@endpush