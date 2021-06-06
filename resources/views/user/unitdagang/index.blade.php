@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Unit Dagang</a></li>
        </ul>
    </div>
</div>
<section class="section--storeList" style="background-image: url('img/pages/bg.jpg');">
    <div class="container">
        <h2 class="page__title">Unit Dagang</h2>
        <div class="storeList__content">
            <div class="row">
                @foreach($merchants as $m)
                <div class="col-12 col-lg-4">
                    <div class="storeList__item">
                        <div class="item__header">
                            @if($m->banner == "")
                                <img src="{{ url('img/logo.png') }}" alt>
                            @else
                                <img src="{{ url(\Config::get('website.url_photo').$m->banner) }}" alt>
                            @endif
                            <div class="item__content">
                                <h5 class="item__title">{{ $m->name }}</h5>
                                <div class="item__rating">
                                    <select class="rating-stars">
                                        <option value=""></option>
                                        <option value="1" {{ ($m->rating == 1) ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($m->rating == 2) ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($m->rating == 3) ? 'selected' : '' }}>3</option>
                                        <option value="4"  {{ ($m->rating == 4) ? 'selected' : '' }}>4</option>
                                        <option value="5" {{ ($m->rating == 5) ? 'selected' : '' }}>5</option>
                                    </select>
                                </div>
                                <div class="item__street">{{ $m->owner_address }}</div>
                                <div class="item__phone"> <i class="fa fa-phone"></i> {{ $m->whatsapp }}</div>
                            </div>
                        </div>
                        <div class="item__footer"><a class="item__store" href="{{ route('merchant.detail', [$m->code]) }}">Lihat Toko</a>
                            <div class="item__avatar">
                                <div class="avatar">
                                    @if($m->banner == "")
                                        <img src="{{ url('img/logo.png') }}" alt>
                                    @else
                                        <img src="{{ url(\Config::get('website.url_photo').$m->photo) }}" alt>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
