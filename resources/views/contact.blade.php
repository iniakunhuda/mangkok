@extends('layout')

@section('content')
<div class="ps-breadcrumb">
    <div class="container">
        <ul class="ps-breadcrumb__list">
            <li class="active"><a href="{{ url('/') }}">Home</a></li>
            <li><a href="javascript:void(0);">Kontak Kami</a></li>
        </ul>
    </div>
</div>
<section class="section--contact">
    <div class="container">
        <h2 class="page__title">Kontak Kami</h2>
        <div class="contact__content">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact__map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.259507048224!2d112.76764231472302!3d-7.324721794713858!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae725c25df7%3A0x558e68bb9f5152c2!2sKampung%20Kue!5e0!3m2!1sen!2sid!4v1619679571560!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="contact__title">Follow Sosial Media</h3>
                            <div class="contact__social"><a class="icon_social facebook" href="#"><i class="fa fa-facebook-f"></i></a><a class="icon_social twitter" href="#"><i class="fa fa-twitter"></i></a><a class="icon_social google" href="#"><i class="fa fa-google-plus"></i></a><a class="icon_social youtube" href="#"><i class="fa fa-youtube"></i></a><a class="icon_social wifi" href="#"><i class="fa fa-wifi"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    {{-- <form> --}}
                        <div class="contact__form">
                            <h3 class="contact__title">Ada pertanyaan?</h3>
                            <p>Tanya pertanyaan mengenai Kampung Kue Surabaya melalui whatsapp pengurus Kampung Kue</p>
                            <a href="wa.me/{{ \Config::get('website.whatsapp') }}" class="btn ps-button contact__send">WHATSAPP</a>
                            {{-- <div class="form-row">
                                <div class="col-12 form-group--block">
                                    <label>Nama: <span>*</span></label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Email: <span>*</span></label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Tentang: </label>
                                    <input class="form-control" type="text" required>
                                </div>
                                <div class="col-12 form-group--block">
                                    <label>Pesan: <span>*</span></label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <button class="btn ps-button contact__send">Kirim Pesan</button> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
