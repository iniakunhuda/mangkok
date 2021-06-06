@php
 if(!isset($show_footer)) $show_footer = true;   
@endphp

<footer class="ps-footer--business">
    <div class="ps-footer__contact">
        <div class="container">

            @if($show_footer)
            <div class="row ps-contact__row">
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__box">
                        <div class="ps-contact__title">Telp / Whatsapp</div>
                        <div class="ps-contact__content">
                            <div class="ps-contact__text">{{ \Config::get('website.whatsapp') }}</div>
                            <div class="ps-contact__icon"><i class="icon-bubbles"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__box">
                        <div class="ps-contact__title">Alamat</div>
                        <div class="ps-contact__content">
                            <div class="ps-contact__text">{{ \Config::get('website.alamat') }}</div>
                            <div class="ps-contact__icon"><i class="icon-map-marker"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="ps-contact__box">
                        <div class="ps-contact__title">Jam Buka</div>
                        <div class="ps-contact__content">
                            <div class="ps-contact__text">{{ \Config::get('website.jam_buka') }}</div>
                            <div class="ps-contact__icon"><i class="icon-self-timer"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="ps-contact__about">
                        <h3 class="ps-about__logo">Kampung<b>Kue</b></h3>
                        <p class="ps-about__des">
                            {{ \Config::get('website.desc') }}
                        </p>
                        <div class="ps-about__social"><a href="#"><i class="fa fa-facebook-f"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-youtube"></i></a><a class="wifi" href="#"><i class="fa fa-wifi"></i></a></div>
                    </div>
                </div>
                <div class="col-12 col-lg-2">&nbsp;</div>
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="ps-contact__link">
                                <div class="ps-link__title">Halaman<span class="footer-toggle"><i class="icon-chevron-down"></i></span></div>
                                <ul class="ps-link__list">
                                    <li> <a href="{{ route('about') }}">Tentang Kami</a>
                                    </li>
                                    <li> <a href="{{ route('product.index') }}">Produk</a>
                                    </li>
                                    <li> <a href="{{ route('merchant.index') }}">Unit Dagang</a>
                                    </li>
                                    <li> <a href="{{ route('contact') }}">Kontak Kami</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>