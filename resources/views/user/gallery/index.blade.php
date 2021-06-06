@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Galeri</a></li>
        </ul>
    </div>
</div>
<section class="section--blogGird">
    <div class="container">
        <div class="blog--header">
            <h2 class="page__title">Galeri</h2>
        </div>
        <div class="blog__content">
            <div class="blog__post">
                <div class="row">
                    @foreach($galleries as $g)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="blog--gird">
                            <div class="post__img"><a href="{{ route('gallery.detail',[$g->slug]) }}">
                            <img src="{{ url(\Config::get('website.url_galeri').$g->cover) }}" alt="alt" /></a></div>
                            <div class="post__content">
                                <a class="post__title" href="{{ route('gallery.detail',[$g->slug]) }}">
                                    {{ $g->title }}
                                </a><br>
                                <small>{{ \Carbon\Carbon::parse($g->date)->format('d M Y') }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- <div class="ps-pagination blog--pagination">
                <ul class="pagination">
                    <li class="chevron"><a href="#"><i class="icon-chevron-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="chevron"><a href="#"><i class="icon-chevron-right"></i></a></li>
                </ul>
            </div> -->
        </div>
    </div>
</section>
@endsection
