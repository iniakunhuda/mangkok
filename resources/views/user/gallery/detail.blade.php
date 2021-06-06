@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li class="active"><a href="{{ url('/') }}">Galeri</a></li>
            <li><a href="javascript:void(0);">{{ $data->title }}</a></li>
        </ul>
    </div>
</div>
<section class="section--blogGird">
    <div class="container">
        <div class="blog--header">
            <h2 class="page__title">{{ $data->title }}</h2>
            <div class="ps-breadcrumb">
                <div class="container">
                    <ul class="ps-breadcrumb__list">
                        <li><a href="javascript:void(0);">{{ \Carbon\Carbon::parse($data->date)->format('d M Y') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog__content">
            <div class="blog__post">
                <div class="row popup-gallery">
                    @foreach($data->images as $img)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog--gird">
                            <div class="post__img">
                                <a class="image-link" title="{{ $img['desc'] }}" href="{{ url(\Config::get('website.url_galeri').$img['url']) }}">
                                    <img src="{{ url(\Config::get('website.url_galeri').$img['url']) }}" alt="alt" />
                                </a>
                            </div>
                            <div class="post__content">
                                {{ $img['desc'] }}
                            </div>
                        </div>
                    </div>
                    @endforeach
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
            },
        });
      });
      </script>
@endpush