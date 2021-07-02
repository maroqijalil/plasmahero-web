<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>PlasmaHero | @yield('title')</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset("assets/img/favicon.png") }}" rel="icon">
        <link href="{{ asset("assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/icofont/icofont.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/venobox/venobox.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/animate.css/animate.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/owl.carousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
        <link href="{{ asset("assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css") }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset("assets/css/style.css") }}" rel="stylesheet">

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    </head>
    <body>
        <!-- ======= Header ======= -->
        @include('user.layouts.header')
        <!-- End Header -->

        <main id="main">

          <!-- ======= Breadcrumbs Section ======= -->
          <section class="breadcrumbs">
            <div class="container">

              <div class="d-flex justify-content-between align-items-center">
                <h2>@yield('title')</h2>
                <ol>
                  <li>@yield('title')</li>
                </ol>
              </div>

            </div>
          </section>
          <!-- End Breadcrumbs Section -->

          <section class="inner-page">
            @yield('content')
          </section>

        </main>

        <!-- ======= Footer ======= -->
        @include('user.layouts.footer')
        <!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset("assets/vendor/jquery/jquery.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/jquery.easing/jquery.easing.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/php-email-form/validate.js") }}"></script>
        <script src="{{ asset("assets/vendor/venobox/venobox.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/waypoints/jquery.waypoints.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/counterup/counterup.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/owl.carousel/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js") }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset("assets/js/main.js") }}"></script>

    </body>
</html>
