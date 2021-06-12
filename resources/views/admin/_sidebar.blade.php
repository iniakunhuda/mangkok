<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">

                @if(!\Auth::check())
                <div class="listview-title mt-1">Menu</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('index') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="home"></ion-icon>
                            </div>
                            <div class="in">
                                Homepage
                            </div>
                        </a>
                    </li>
                </ul>
                @endif

                <!-- profile box -->
                @if(\Auth::check())
                <div class="profileBox pt-2 pb-2">
                    <div class="in">
                        <strong>{{ \Auth::guard('admin')->user()->name }}</strong>
                        <div class="text-muted">{{ \Auth::guard('admin')->user()->role }}</div>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <!-- menu -->
                <div class="listview-title mt-1">Menu</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('admin.home') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="home"></ion-icon>
                            </div>
                            <div class="in">
                                Homepage
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- * menu -->

                <!-- others -->
                <div class="listview-title mt-1">Lainnya</div>
                <ul class="listview flush transparent no-line image-listview">
                    <li>
                        <a href="{{ route('admin.logout') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Keluar
                            </div>
                        </a>
                    </li>
                </ul>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->