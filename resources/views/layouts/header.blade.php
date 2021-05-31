<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    {{-- <h1 class="logo mr-auto"><a href="index.html">Plasmahero.id</a></h1> --}}
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.html" class="logo mr-auto"><img src="{{ asset("assets/img/logofull.png") }}" alt="" class="img-fluid">PlasmaHero</a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active"><a href="index.html">Beranda</a></li>
        <li><a href="#about">FAQ</a></li>
        <li class="drop-down"><a href="">Donor</a>
          <ul>
            <li><a href="{{route('carikan-plasma')}}">Carikan Plasma</a></li>
            <li><a href="#">Donorkan Plasma</a></li>
          </ul>
        </li>
        <li class="drop-down"><a href="">COVID</a>
          <ul>
            <li><a href="#">NEWS</a></li>
            <li><a href="#">Curhat</a></li>
          </ul>
        </li>
        <li><a href="#">Donasi</a></li>

        @if (Auth::check())
        <li class="drop-down"><a href="">{{ Auth::user()->name }}</a>
          <ul>
            <li><a href="{{route('profile')}}">Profil</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li><a href="{{route('register')}}"><div class="font-weight-bold text-danger">Masuk/Daftar</div></a></li>
        @endif

      </ul>
    </nav><!-- .nav-menu -->
    {{-- <a href="#appointment" class="appointment-btn scrollto">Live Chat</a> --}}
    

  </div>
</header>