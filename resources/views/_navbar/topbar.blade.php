<div class="top-bar">
    <div class="top-bar__left">
    </div>
    <div class="top-bar__right">
        <ul class="nav-top">
            <li class="nav-top-item contact"><a class="nav-top-link" href="wa.me/{{ \Config::get('website.whatsapp') }}" target="_blank"> <i class="icon-telephone"></i><span>Whatsapp:</span>
                <span class="text-success font-bold">{{ \Config::get('website.whatsapp') }}</span></a></li>
            <li class="nav-top-item account">
                @if(\Auth::check())
                <a class="nav-top-link" href="javascript:void(0);"> <i class="icon-user"></i>Hi! 
                    <span class="font-bold">{{ \Auth::user()->name }}</span>
                </a>
                @else
                <a class="nav-top-link" href="{{ route('login') }}"> <i class="icon-enter"></i> 
                    <span class="font-bold">Login</span>
                </a>
                @endif
                
                @if(\Auth::check())
                <div class="account--dropdown">
                    <div class="account-anchor">
                        <div class="triangle"></div>
                    </div>
                    <div class="account__content">
                        <ul class="account-list">
                            <li class="title-item"> <a href="javascript:void(0);">Akun Saya</a>
                            </li>
                            <li> <a href="{{ route('home') }}">Dashboard</a>
                            </li>
                            <!-- TODO -->
                            <li> <a href="">Pesanan Saya</a>
                            </li>
                            <li> <a href="">Akun Saya</a>
                            </li>
                        </ul>
                        <hr><a class="account-logout" href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="icon-exit-left"></i>Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none hidden">
                            @csrf
                        </form>
                    </div>
                </div>
                @endif
            </li>
        </ul>
    </div>
</div>