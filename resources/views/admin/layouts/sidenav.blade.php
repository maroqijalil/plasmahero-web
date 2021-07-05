<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center mt-3">
{{--            <a class="navbar-brand" href="javascript:void(0)">--}}
{{--                <img src="{{asset("img/brand/blue.png")}}" class="navbar-brand-img" alt="...">--}}
{{--            </a>--}}
            <h1>Plasmahero</h1>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index-pendonoran') }}">
                            <i class="ni ni-favourite-28 text-primary"></i>
                            <span class="nav-link-text">Pencocokan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index-pendonor') }}">
                            <i class="ni ni-single-02 text-warning"></i>
                            <span class="nav-link-text">Pendonor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index-pemohon') }}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Pemohon</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chat', ['id' => 1]) }}">
                            <i class="ni ni-chat-round text-primary"></i>
                            <span class="nav-link-text">Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.donor.unit') }}">
                            <i class="ni ni-building text-primary"></i>
                            <span class="nav-link-text">Unit Donor</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan-status') }}">
                            <i class="ni ni-archive-2 text-primary"></i>
                            <span class="nav-link-text">Laporan Status</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan-tanggal') }}">
                            <i class="ni ni-archive-2 text-primary"></i>
                            <span class="nav-archive-2">Laporan Tanggal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri') }}">
                            <i class="ni ni-album-2 text-primary"></i>
                            <span class="nav-link-text">Galeri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cerita') }}">
                            <i class="ni ni-ruler-pencil text-primary"></i>
                            <span class="nav-link-text">Cerita</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            <i class="ni ni-single-02 text-primary"></i>
                            <span class="nav-link-text">Profil</span>
                        </a>
                    </li>
                </ul>
                <hr class="my-3">
            </div>
        </div>
    </div>
</nav>
