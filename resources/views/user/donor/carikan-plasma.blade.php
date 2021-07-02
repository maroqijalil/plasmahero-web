@extends('user.layouts.app')

@section('title', 'Carikan Plasma')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h3>Carikan Plasma</h3>

      @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      @elseif(Session::has('already'))
      <div class="alert alert-danger">
        {{Session::get('already')}}
      </div>
      @endif

      <p>
        Selamat datang di halaman Pencarian Plasma. Disini anda akan diarahkan untuk memulai prosedur pencarian plasma.
        Untuk mencari plasma, ikuti langkah langkah berikut :
      </p>
      <ul>
        <li>Lengkapi data diri pengguna pada halaman <a href="{{route('detail-pengguna')}}">detail pengguna</a></li>
        <li>Isi kolom Tipe dengan "Pendonor"</li>
        <li>Lengkapi Bukti pendukung</li>
        <li>Submit</li>
        <li>Tunggu hingga admin memvalidasi data anda</li>
        <li>Anda dapat melihat status donor anda pada halaman <a href="{{route('profile')}}">profil</a></li>
      </ul>

      <h3>Syarat & Ketentuan</h3>
      <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" readonly>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima aut dolores rem maiores, dicta repudiandae blanditiis fugiat impedit tenetur debitis consequatur sint natus quia incidunt nemo laborum deserunt officiis doloribus illo cum similique? Molestiae ex numquam ullam, maiores delectus cum labore quam? Earum voluptatum rem facilis, a ex dolores ad temporibus sit odio tempore molestias. Repudiandae, veniam, vero hic atque modi provident optio eligendi velit sint sed asperiores ipsa reprehenderit repellat recusandae aliquid ducimus quia ipsum debitis? Obcaecati numquam non doloribus quas explicabo distinctio, a corrupti, quo cum impedit excepturi architecto ab! Perspiciatis doloribus ducimus ipsam. Voluptas voluptatem suscipit laudantium. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquam consequuntur nemo, ullam omnis eum necessitatibus adipisci nam facere ipsum consequatur. Sequi eaque iste aliquid omnis autem ea non tenetur aut minus veritatis tempora amet illo quis animi quae perspiciatis vol
        </textarea>
      </div>

      <form action="" method="post" action="{{ route('carikan.store') }}">
        @method('patch')
        @csrf

        <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">

        <!-- data diri -->
        <legend class="form">Data Diri</legend>
        <div class="form-group row mb-3">
          <label for="no_hp" class="col-2 col-form-label">No. WhatsApp</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor WhatsApp" id="no_hp" name="no_hp" value="{{ Auth::user()->pengguna->no_hp ?? old('no_hp') }}">

            <!-- Error -->
            @if ($errors->has('no_hp'))
            <div class="error">
                {{ $errors->first('no_hp') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="alamat" class="col-2 col-form-label">Alamat</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ Auth::user()->pengguna->alamat ?? old('alamat') }}">

            <!-- Error -->
            @if ($errors->has('alamat'))
            <div class="error">
                {{ $errors->first('alamat') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kelurahan" class="col-2 col-form-label">Kelurahan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="{{ Auth::user()->pengguna->kelurahan ?? old('kelurahan') }}">

            <!-- Error -->
            @if ($errors->has('kelurahan'))
            <div class="error">
                {{ $errors->first('kelurahan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="{{ Auth::user()->pengguna->kecamatan ?? old('kecamatan') }}">

            <!-- Error -->
            @if ($errors->has('kecamatan'))
            <div class="error">
                {{ $errors->first('kecamatan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kota" class="col-2 col-form-label">Kota</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="{{ Auth::user()->pengguna->kota ?? old('kota') }}">

            <!-- Error -->
            @if ($errors->has('kota'))
            <div class="error">
                {{ $errors->first('kota') }}
            </div>
            @endif
          </div>
        </div>

        <!-- keperluan donor -->
        <legend>Keperluan Donor</legend>
        <div class="form-group row mb-3">
          <label for="usia" class="col-2 col-form-label">Usia</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('usia') ? 'error' : '' }}" type="number" placeholder="Usia Pendonor" id="usia" name="usia" value="{{ Auth::user()->pengguna->usia ?? old('usia') }}">

            <!-- Error -->
            @if ($errors->has('usia'))
            <div class="error">
                {{ $errors->first('usia') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
          <div class="col-10">
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
              <option value="l" {{strtolower(Auth::user()->pengguna->jenis_kelamin) == 'laki-laki' || strtolower(Auth::user()->pengguna->jenis_kelamin) == 'l' ? 'selected' : ''}}>Laki-laki</option>
              <option value="p" {{strtolower(Auth::user()->pengguna->jenis_kelamin) == 'perempuan' || strtolower(Auth::user()->pengguna->jenis_kelamin) == 'p' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="gol_darah" class="col-2 col-form-label">Golongan Darah</label>
          <div class="col-10">
            <select class="form-control {{ $errors->has('gol_darah') ? 'error' : '' }}" id="gol_darah" name="gol_darah">
              <option value="a" {{strtolower(Auth::user()->pengguna->gol_darah) == 'a' ? 'selected' : ''}}>A</option>
              <option value="b" {{strtolower(Auth::user()->pengguna->gol_darah) == 'b' ? 'selected' : ''}}>B</option>
              <option value="ab" {{strtolower(Auth::user()->pengguna->gol_darah) == 'ab' ? 'selected' : ''}}>AB</option>
              <option value="o" {{strtolower(Auth::user()->pengguna->gol_darah) == 'o' ? 'selected' : ''}}>O</option>
            </select>

            <!-- Error -->
            @if ($errors->has('gol_darah'))
            <div class="error">
                {{ $errors->first('gol_darah') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="rhesus" class="col-2 col-form-label">Rhesus</label>
          <div class="col-10">
            <select class="form-control {{ $errors->has('rhesus') ? 'error' : '' }}" id="rhesus" name="rhesus">
              <option value="+" {{strtolower(Auth::user()->pengguna->rhesus) == '+' ? 'selected' : ''}}>Positif</option>
              <option value="-" {{strtolower(Auth::user()->pengguna->rhesus) == '-' ? 'selected' : ''}}>Negatif</option>
            </select>

            <!-- Error -->
            @if ($errors->has('rhesus'))
            <div class="error">
                {{ $errors->first('rhesus') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="berat_badan" class="col-2 col-form-label">Berat Badan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('berat_badan') ? 'error' : '' }}" type="number" placeholder="Berat Badan" id="berat_badan" name="berat_badan" value="{{ Auth::user()->pengguna->berat_badan ?? old('berat_badan') }}">

            <!-- Error -->
            @if ($errors->has('berat_badan'))
            <div class="error">
                {{ $errors->first('berat_badan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="tanggal_swab" class="col-2 col-form-label">Tanggal Swab</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('tanggal_swab') ? 'error' : '' }}" type="date" placeholder="Tanggal Swab" id="tanggal_swab" name="tanggal_swab" value="{{ Auth::user()->pengguna->tanggal_swab ?? old('tanggal_swab') }}">

            <!-- Error -->
            @if ($errors->has('tanggal_swab'))
            <div class="error">
                {{ $errors->first('tanggal_swab') }}
            </div>
            @endif
          </div>
        </div>

        <input type="submit" name="send" value="Submit" class="btn mt-4 btn-primary ml-50 float-right">
      </form>

    </div>
  </div>

</div>

@endsection
