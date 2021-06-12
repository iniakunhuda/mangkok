@extends('layout')

@section('title')
    Mangkok
@endsection

@section('content')
<div id="appCapsule">

    <div class="section mt-5 pt-1">
        <div class="owl-carousel">
            <div>Banner</div>
        </div>
    </div>

    <div class="section mt-3 pt-1">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="boxed">
                            <form action="{{ route('menu') }}" method="GET">
                                <select name="cat" id="" class="form-control mb-2">
                                    <option value="">Pilih Kategori</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->_id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <input class="form-control mb-2" name="q" type="text" placeholder="Cari Makanan / Minuman">
                                <button class="btn btn-dark btn-block">Cari Menu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section pt-1 mt-5">
        <h3>Kategori Makanan</h3>
        <div class="row">
            @foreach($categories as $cat)
            <div class="col-6 col-md-3 mt-2">
                <div class="card hand" 
                    onclick="window.location.href='{{ route('menu') }}?cat={{ $cat->_id }}'"
                    style="height:200px;padding: 30px 0;text-align: center;">
                    <div class="card-body">
                        <img src="{{ $cat->icon }}" alt="Icon" style="width: 70px;
                        height: 70px;
                        object-fit: cover;
                        border-radius: 50px;"><br><br>
                        <strong>{{ $cat->name }}</strong>
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
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      nav: true,
      items: 1
  });
});
</script>
@endpush