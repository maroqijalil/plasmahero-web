<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset("assets/img/brand/favicon.png")}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset("assets/vendor/nucleo/css/nucleo.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/vendor/@fortawesome/fontawesome-free/css/all.min.css")}}"
        type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset("assets/css/argon.css?v=1.2.0")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("css/my.css")}}" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    @include('admin.layouts.sidenav')
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <i class="ni ni-single-02 avatar rounded-circle"></i>
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="{{ route('show-admin-akun') }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" class="dropdown-item" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_type"
                                        value="{{ Auth::user()->admin ? 'admin' : 'pengguna' }}">
                                    <button type="submit" style="border: none; background: none;">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Default</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Default</li>
                                </ol>
                            </nav>
                        </div>
                        {{--                    <div class="col-lg-6 col-5 text-right">--}}
                        {{--                        <a href="#" class="btn btn-sm btn-neutral">New</a>--}}
                        {{--                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>--}}
                        {{--                    </div>--}}
                    </div>
                    <!-- Card stats -->
                    @yield('card-stats')
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            @yield('content')
            <!-- Footer -->
            @include('admin.layouts.footer')
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{asset("assets/vendor/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("assets/vendor/js-cookie/js.cookie.js")}}"></script>
    <script src="{{asset("assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js")}}"></script>
    <script src="{{asset("assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js")}}"></script>
    <!-- Optional JS -->
    <script src="{{asset("assets/vendor/chart.js/dist/Chart.min.js")}}"></script>
    <script src="{{asset("assets/vendor/chart.js/dist/Chart.extension.js")}}"></script>
    <!-- Argon JS -->
    <script src="{{asset("assets/js/argon.js?v=1.2.0")}}"></script>
    @yield('script')
</body>

</html>
