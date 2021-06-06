<!-- App Sidebar -->
<div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <!-- profile box -->
                <div class="profileBox pt-2 pb-2">
                    <div class="in">
                        <strong>{{ \Auth::guard('admin')->user()->name }}</strong>
                        <div class="text-muted">{{ \Auth::guard('admin')->user()->role }}</div>
                    </div>
                    <a href="#" class="btn btn-link btn-icon sidebar-close" data-bs-dismiss="modal">
                        <ion-icon name="close-outline"></ion-icon>
                    </a>
                </div>
                <!-- * profile box -->
                <!-- balance -->
                {{-- <div class="sidebar-balance">
                    <div class="listview-title">Pendapatan</div>
                    <div class="in">
                        <h1 class="amount">Rp15.000.000</h1>
                    </div>
                </div> --}}
                <!-- * balance -->

                <!-- action group -->
                {{-- <div class="action-group">
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="add-outline"></ion-icon>
                            </div>
                            Deposit
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-down-outline"></ion-icon>
                            </div>
                            Withdraw
                        </div>
                    </a>
                    <a href="index.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="arrow-forward-outline"></ion-icon>
                            </div>
                            Send
                        </div>
                    </a>
                    <a href="app-cards.html" class="action-button">
                        <div class="in">
                            <div class="iconbox">
                                <ion-icon name="card-outline"></ion-icon>
                            </div>
                            My Cards
                        </div>
                    </a>
                </div> --}}
                <!-- * action group -->

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
                    <li>
                        <a href="{{ route('admin.merchants.index') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="storefront-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Unit Dagang
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="albums-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Produk
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="pricetags-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Kategori Produk
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="app-pages.html" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="cart-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Transaksi
                            </div>
                            <span class="badge badge-primary">10</span>
                        </a>
                    </li>
                </ul>
                <!-- * menu -->

                <!-- others -->
                <div class="listview-title mt-1">Lainnya</div>
                <ul class="listview flush transparent no-line image-listview">
                    {{-- <li>
                        <a href="app-settings.html" class="item">
                            <div class="icon-box bg-brown">
                                <ion-icon name="settings-outline"></ion-icon>
                            </div>
                            <div class="in">
                                Pengaturan
                            </div>
                        </a>
                    </li> --}}
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
                <!-- * others -->

            </div>
        </div>
    </div>
</div>
<!-- * App Sidebar -->