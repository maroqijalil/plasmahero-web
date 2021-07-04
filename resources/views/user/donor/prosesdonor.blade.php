@extends('user.layouts.app')

@section('title', 'Pendonoran Plasma')

@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <h3 class="text-center font-weight-bold">Pendonoran Plasma</h3>

      @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      @elseif(Session::has('already'))
      <div class="alert alert-danger">
        {{Session::get('already')}}
      </div>
      @elseif(Session::has('email_verif'))
      <div class="alert alert-success">
        {{Session::get('email_verif')}}
      </div>
      @elseif(Session::has('error'))
      <div class="alert alert-danger">
        {{Session::get('error')}}
      </div>
      @endif

      <br>
      <p>
        Selamat datang di halaman Pencarian Plasma. Disini anda akan diarahkan untuk memulai prosedur pencarian plasma.
        Untuk mencari maupun mendonorkan plasma, ikuti langkah langkah berikut :
      </p>
      <ul>
        <li>Isi kolom Tipe sesuai kebutuhan anda "Pendonor/Penerima"</li>
        <li>Lengkapi Bukti pendukung</li>
        <li>Isi form data diri dibawah</li>
        <li>Klik tombol simpan</li>
        <li>Anda dapat melihat status donor anda pada halaman profil <a href="{{route('profile')}}">disini</a></li>
        <li>Tunggu hingga admin memvalidasi data anda</li>
      </ul>
      <br>
      <br>
      <h3 class="text-center font-weight-bold">Syarat & Ketentuan</h3>
      <br>

      <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" readonly>
          Ini Syarat yang Harus Dipenuhi Sebelum Donor Darah, Berikut ini syarat umum yang harus dipenuhi sebelum melakukan donor darah: 1. Kondisi fisik harus dalam keadaan sehat, jasmani maupun rohani. 2. Berusia 17-60 tahun. Namun, untuk remaja usia 17 tahun diperbolehkan menjadi donor darah, bila mendapat izin tertulis dari orangtua dan memenuhi persyaratan lain. 3. Memiliki berat badan minimal 45 kilogram. 4. Suhu tubuh 36,6-37,5 derajat Celcius. 5. Tekanan darah harus berada di angka 100-160 untuk sistolik dan 70-100 untuk diastolik. 6. Saat pemeriksaan, denyut nadi harus sekitar 50-100 kali per menit. 7. Kadar hemoglobin minimal 12 gr/dl untuk wanita, dan minimal 12,5 gr/dl untuk pria.
        </textarea>
      </div>

      <br>
      <br>
      @if (!$isAllComplete)
      <h3 class="text-center font-weight-bold">Form Data Diri</h3>
      <br>

      <form action="" method="post" action="{{ route('donor.store') }}">
        @method('patch')
        @csrf
        
        @if (!$pengguna->nama_tipe ?? true)
        <legend class="form">Partisipasi</legend>
        <div class="form-group row mb-3">
          <label for="no_hp" class="col-2 col-form-label">Sebagai</label>
          <div class="col-10">
            <select class="form-control {{ $errors->has('nama_tipe') ? 'error' : '' }}" id="nama_tipe" name="nama_tipe">
              <option value="pendonor" {{ strtolower($pengguna->nama_tipe) == 'pendonor' ? 'selected' : '' }}>Pendonor</option>
              <option value="penerima" {{ strtolower($pengguna->nama_tipe) == 'penerima' ? 'selected' : '' }}>Pencari Donor</option>
            </select>

            <!-- Error -->
            @if ($errors->has('nama_tipe'))
            <div class="error text-danger" style="font-size: 12px;">
              {{ $errors->first('nama_tipe') }}
            </div>
            @endif
          </div>
        </div>
        @endif

        <!-- data diri -->
        @if (!$isDataDiriComplete)
        <legend class="form">Data Diri</legend>
        <div class="form-group row mb-3">
          <label for="no_hp" class="col-2 col-form-label">No. WhatsApp</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor WhatsApp" id="no_hp" name="no_hp" value="{{ $pengguna->no_hp ?? old('no_hp') }}">

            <!-- Error -->
            @if ($errors->has('no_hp'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('no_hp') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="alamat" class="col-2 col-form-label">Alamat</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ $pengguna->alamat ?? old('alamat') }}">

            <!-- Error -->
            @if ($errors->has('alamat'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('alamat') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kelurahan" class="col-2 col-form-label">Kelurahan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="{{ $pengguna->kelurahan ?? old('kelurahan') }}">

            <!-- Error -->
            @if ($errors->has('kelurahan'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('kelurahan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="{{ $pengguna->kecamatan ?? old('kecamatan') }}">

            <!-- Error -->
            @if ($errors->has('kecamatan'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('kecamatan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="kota" class="col-2 col-form-label">Kota</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="{{ $pengguna->kota ?? old('kota') }}">

            <!-- Error -->
            @if ($errors->has('kota'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('kota') }}
            </div>
            @endif
          </div>
        </div>
        @endif

        <!-- keperluan donor -->
        @if (!$isDataDonorComplete)
        <legend>Keperluan Donor</legend>
        <div class="form-group row mb-3">
          <label for="usia" class="col-2 col-form-label">Usia</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('usia') ? 'error' : '' }}" type="number" placeholder="Usia Pendonor" id="usia" name="usia" value="{{ $pengguna->usia ?? old('usia') }}">

            <!-- Error -->
            @if ($errors->has('usia'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('usia') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
          <div class="col-10">
            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
              <option value="l" {{ strtolower($pengguna->jenis_kelamin) == 'laki-laki' || strtolower($pengguna->jenis_kelamin) == 'l' ? 'selected' : ''}}>Laki-laki</option>
              <option value="p" {{ strtolower($pengguna->jenis_kelamin) == 'perempuan' || strtolower($pengguna->jenis_kelamin) == 'p' ? 'selected' : ''}}>Perempuan</option>
            </select>
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="gol_darah" class="col-2 col-form-label">Golongan Darah</label>
          <div class="col-10">
            <select class="form-control {{ $errors->has('gol_darah') ? 'error' : '' }}" id="gol_darah" name="gol_darah">
              <option value="a" {{ strtolower($pengguna->gol_darah) == 'a' ? 'selected' : ''}}>A</option>
              <option value="b" {{ strtolower($pengguna->gol_darah) == 'b' ? 'selected' : ''}}>B</option>
              <option value="ab" {{ strtolower($pengguna->gol_darah) == 'ab' ? 'selected' : ''}}>AB</option>
              <option value="o" {{ strtolower($pengguna->gol_darah) == 'o' ? 'selected' : ''}}>O</option>
            </select>

            <!-- Error -->
            @if ($errors->has('gol_darah'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('gol_darah') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="rhesus" class="col-2 col-form-label">Rhesus</label>
          <div class="col-10">
            <select class="form-control {{ $errors->has('rhesus') ? 'error' : '' }}" id="rhesus" name="rhesus">
              <option value="+" {{ strtolower($pengguna->rhesus) == '+' ? 'selected' : ''}}>Positif</option>
              <option value="-" {{ strtolower($pengguna->rhesus) == '-' ? 'selected' : ''}}>Negatif</option>
            </select>

            <!-- Error -->
            @if ($errors->has('rhesus'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('rhesus') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="berat_badan" class="col-2 col-form-label">Berat Badan</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('berat_badan') ? 'error' : '' }}" type="number" placeholder="Berat Badan" id="berat_badan" name="berat_badan" value="{{ $pengguna->berat_badan ?? old('berat_badan') }}">

            <!-- Error -->
            @if ($errors->has('berat_badan'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('berat_badan') }}
            </div>
            @endif
          </div>
        </div>

        <div class="form-group row mb-3">
          <label for="tanggal_swab" class="col-2 col-form-label">Tanggal Swab</label>
          <div class="col-10">
            <input class="form-control {{ $errors->has('tanggal_swab') ? 'error' : '' }}" type="date" placeholder="Tanggal Swab" id="tanggal_swab" name="tanggal_swab" value="{{ $pengguna->tanggal_swab ?? old('tanggal_swab') }}">

            <!-- Error -->
            @if ($errors->has('tanggal_swab'))
            <div class="error text-danger" style="font-size: 12px;">
                {{ $errors->first('tanggal_swab') }}
            </div>
            @endif
          </div>
        </div>
        @endif

        <input type="submit" name="send" value="Simpan" class="btn mt-4 btn-primary ml-50 float-right">
      </form>
      @else
      <div class="container-fluid">
        <div class="row justify-content-between align-items-center alert alert-success">
          <div style="margin-right: 18px;">
            <p>
              Anda telah mengisi data untuk keperluan donor Anda! <br>
              Silahkan menuju menu profil untuk melanjutkan proses pendonoran Anda!
            </p>
          </div>
          <a href="{{ route('profile') }}"><button class="btn btn-primary">Lihat Profil >></button></a>
        </div>
      </div>
      @endif
    </div>
  </div>
  @if(Session::has('email_verif'))
  <div class="modal fade" id="firstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Selamat Datang di Plasmahero</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <h4>Ingin berpartisipasi dalam pendonoran?</h4>
            <p>Anda dapat memilih apakah anda ingin mendonorkan plasma anda atau mencari donor plasma.</p>
          </div>

          <div class="mt-4">
            <div class="row align-items-center">
              <div class="col-10">
                <h6>Anda dapat Melakukan Pengisian detail data partisipasi Anda sekarang atau lain kali.</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <a href="{{ route('home') }}">
            <button type="button" class="btn btn-secondary">Lain kali</button>
          </a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Isi Sekarang >></button>
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

@endsection

@section('js')
<script>
  $(document).ready(function(){
    $("#firstModal").modal('show');
  });
</script>
@endsection
