<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    {{-- <h1 class="logo mr-auto"><a href="index.html">Plasmahero.id</a></h1> --}}
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="index.html" class="logo mr-auto"><img src="{{ asset("assets/img/logofull.png") }}" alt="" class="img-fluid">PlasmaHero</a>

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li class="active">
          <a href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="">
          <a href="{{route('donor.index')}}">Donor</a>
        </li>
        <li class="drop-down"><a href="#">COVID</a>
          <ul>
            <li><a href="#">Berita</a></li>
            <li><a href="#">Curhat</a></li>
          </ul>
        </li>
        <li><a href="#about">FAQ</a></li>

        @if (Auth::check())
        <li class="drop-down"><a href="#">{{ Auth::user()->name }}</a>
          <ul>
            <li><a href="{{route('profile')}}">Dasbor</a></li>
            <li><a href="{{route('chat', ['id'=>Auth::user()->id])}}">Chat</a></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <input type="hidden" name="user_type" value="pengguna">
                
                <a href="" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
              </form>
            </li>
          </ul>
        </li>
        @else
          <li><a href="{{route('login')}}"><div class="font-weight-bold text-success">Masuk</div></a></li>
          <li><a href="{{route('register')}}"><div class="font-weight-bold text-primary">Daftar</div></a></li>
        @endif

      </ul>
    </nav><!-- .nav-menu -->
    {{-- <a href="#appointment" class="appointment-btn scrollto">Live Chat</a> --}}
    

  </div>
</header>