@extends('user.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">

  @if(Session::has('eSent'))
    <div class="alert alert-success">
      {{Session::get('eSent')}}
    </div>
  @elseif(Session::has('report'))
    <div class="alert alert-success">
      {{Session::get('report')}}
    </div>
  @elseif(Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @elseif(Session::has('error'))
  <div class="alert alert-danger">
    {{Session::get('error')}}
  </div>
  @endif

  <div class="row">
    <div class="col-md-4 kiri mb-4">
      <h2 class="text-center font-weight-bold">Status</h2>
      <div class="p-1"></div>
      <div class="card mt-4">
        @if(Auth::user()->pengguna)
        <div class="card-body">
          <label for="tipe" class="font-weight-bold mr-4">Tipe   : </label>
          <div class="alert alert-success" id="tipe">{{ Auth::user()->pengguna->nama_tipe ? Auth::user()->pengguna->nama_tipe : 'Anda belum mengisi detail pengguna' }}</div>

          <br>
          <label for="status" class="font-weight-bold mr-4">Status Verifikasi  : </label>
          <div class="alert alert-warning" id="status">
            @if(Auth::user()->pengguna->id_admin)
              Diverifikasi
            @else
              Menunggu Validasi Detail Pengguna
            @endif
          </div>

          <br>
          <label for="status" class="font-weight-bold mr-4">Status Donor  : </label>
          @if(Auth::user()->pengguna->status == 'i')
          <div class="alert alert-primary" id="status">
            Tidak melakukan pendonoran

          @elseif(Auth::user()->pengguna->status == 's')
          <div class="alert alert-warning" id="status">
            Mencari donor

          @elseif(Auth::user()->pengguna->status == 'g')
          <div class="alert alert-warning" id="status">
            Melakukan donor, menunggu pencocokan

          @elseif(Auth::user()->pengguna->status == 'm')
          <div class="alert alert-danger" id="status">
            Pendonoran telah dicocokan, atur jadwal anda!

          @elseif(Auth::user()->pengguna->status == 'p' && Auth::user()->pengguna->nama_tipe == 'pendonor')
          <div class="alert alert-danger" id="status">
            Jadwal donor anda : {{Auth::user()->pengguna->mendonor->first()->tanggal}}

          @elseif(Auth::user()->pengguna->status == 'p' && Auth::user()->pengguna->nama_tipe == 'penerima')
          <div class="alert alert-danger" id="status">
            Jadwal donor anda : {{Auth::user()->pengguna->menerimaDonor->first()->tanggal}}

          @elseif(Auth::user()->pengguna->status == 'a')
          <div class="alert alert-success" id="status">
            Pendonoran telah selesai, isi laporan pendonoran anda!

          @endif
          </div>

          @if(Auth::user()->pengguna->status == 'a')
          <a href="/berita-acara">
            <div class="btn rounded-pill shadow mt-2 font-weight-bold" style="background-color:#DE4F28">Isi Laporan</div>
          </a>
          @elseif(Auth::user()->pengguna->status == 'm')
          <a href="/chat">
            <div class="btn rounded-pill shadow mt-2 font-weight-bold" style="background-color:#DE4F28">Chat & Atur Jadwal</div>
          </a>
          @elseif(Auth::user()->pengguna->status == 'p')
          <a href="/chat">
            <div class="btn rounded-pill shadow mt-2 font-weight-bold" style="background-color:#DE4F28">Donor Selesai</div>
          </a>
          @endif
        </div>
        @else
        <div class="card-body">
          <div class="alert alert-danger text-center">Anda belum memngisi detail pengguna. Isi <a href="{{ route('donor.index') }}">disini</a> </div>
        </div>
        @endif
      </div>
    </div>

    <div class="col-md-8 kanan">
      <h2 class="text-center font-weight-bold">Detail Akun</h2>
      @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
      @endif
      <div class="p-1"></div>
      <div class="card mt-4">
        <div class="card-body">
          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Akun</button>
              <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Diri</button>
              <button class="nav-link" id="nav-contact-tab" data-toggle="tab" data-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Data Donor</button>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <form role="form" method="POST" action="{{route('profile.update')}}">
                @method('patch')
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <div class="py-3"></div>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="emailku@mail.com" value="{{$userData->email}}" readonly name="email">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama" value="{{$userData->name}}" name="name">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="password">Masukkan Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Perbarui Data</button>
              </form>
            </div>
            @php
              $pengguna = Auth::user()->pengguna ?? '';
            @endphp
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              @if ($isDataDiriComplete)
              <form role="form" method="POST" action="{{ route('user-detail.store') }}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <div class="py-3"></div>
                    <label for="no_hp">No. WhatsApp</label>
                    <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor WhatsApp" id="no_hp" name="no_hp" value="{{ $pengguna->no_hp ?? old('no_hp') }}">
    
                    <!-- Error -->
                    @if ($errors->has('no_hp'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('no_hp') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ $pengguna->alamat ?? old('alamat') }}">
    
                    <!-- Error -->
                    @if ($errors->has('alamat'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('alamat') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="kelurahan">Kelurahan</label>
                    <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="{{ $pengguna->kelurahan ?? old('kelurahan') }}">
    
                    <!-- Error -->
                    @if ($errors->has('kelurahan'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('kelurahan') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="kecamatan">Kecamatan</label>
                    <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="{{ $pengguna->kecamatan ?? old('kecamatan') }}">
    
                    <!-- Error -->
                    @if ($errors->has('kecamatan'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('kecamatan') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="kota">Kota</label>
                    <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="{{ $pengguna->kota ?? old('kota') }}">
    
                    <!-- Error -->
                    @if ($errors->has('kota'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('kota') }}
                    </div>
                    @endif
                  </div>
                </div>
  
                <button type="submit" class="btn mt-4 btn-primary ml-50 float-right">Perbarui Data</button>
              </form>
              @else
              <div class="container-fluid">
                <div class="py-3"></div>
                <div class="alert alert-warning">
                  <div style="margin-right: 18px;">
                    <p>
                      Anda belum mengisi Data Diri! Silahkan isi pada menu Donor
                    </p>
                  </div>
                  <a href="{{ route('donor.index') }}"><button class="btn btn-primary">Isi Data >></button></a>
                </div>
              </div>
              @endif
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
              @if ($isDataDonorComplete)
              <form role="form" method="POST" action="{{ route('user-detail.store') }}">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <div class="py-3"></div>
                    <label for="no_hp">Sebagai</label>
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
    
                  <div class="form-group col-md-12">
                    <label for="usia">Usia</label>
                    <input class="form-control {{ $errors->has('usia') ? 'error' : '' }}" type="number" placeholder="Usia Pendonor" id="usia" name="usia" value="{{ $pengguna->usia ?? old('usia') }}">
    
                    <!-- Error -->
                    @if ($errors->has('usia'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('usia') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                      <option value="l" {{ strtolower($pengguna->jenis_kelamin) == 'laki-laki' || strtolower($pengguna->jenis_kelamin) == 'l' ? 'selected' : ''}}>Laki-laki</option>
                      <option value="p" {{ strtolower($pengguna->jenis_kelamin) == 'perempuan' || strtolower($pengguna->jenis_kelamin) == 'p' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="gol_darah">Golongan Darah</label>
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
    
                  <div class="form-group col-md-12">
                    <label for="rhesus">Rhesus</label>
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
    
                  <div class="form-group col-md-12">
                    <label for="berat_badan">Berat Badan</label>
                    <input class="form-control {{ $errors->has('berat_badan') ? 'error' : '' }}" type="number" placeholder="Berat Badan" id="berat_badan" name="berat_badan" value="{{ $pengguna->berat_badan ?? old('berat_badan') }}">
    
                    <!-- Error -->
                    @if ($errors->has('berat_badan'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('berat_badan') }}
                    </div>
                    @endif
                  </div>
    
                  <div class="form-group col-md-12">
                    <label for="tanggal_swab">Tanggal Swab</label>
                    <input class="form-control {{ $errors->has('tanggal_swab') ? 'error' : '' }}" type="date" placeholder="Tanggal Swab" id="tanggal_swab" name="tanggal_swab" value="{{ $pengguna->tanggal_swab ?? old('tanggal_swab') }}">
    
                    <!-- Error -->
                    @if ($errors->has('tanggal_swab'))
                    <div class="error text-danger" style="font-size: 12px;">
                        {{ $errors->first('tanggal_swab') }}
                    </div>
                    @endif
                  </div>
                </div>
  
                <button type="submit" class="btn mt-4 btn-primary ml-50 float-right">Perbarui Data</button>
              </form>
              @else
              <div class="container-fluid">
                <div class="py-3"></div>
                <div class="alert alert-warning">
                  <div style="margin-right: 18px;">
                    <p>
                      Anda belum mengisi Data Donor! Silahkan isi pada menu Donor
                    </p>
                  </div>
                  <a href="{{ route('donor.index') }}"><button class="btn btn-primary">Isi Data >></button></a>
                </div>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      {{-- <label>
        <a href={{ route('user-detail') }}>Detail Data Diri Pengguna</a>
      </label> --}}
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mt-4"></div>
      <h2 class="text-center font-weight-bold mb-4">Histori Donor</h2>
      {{-- {{dump(date('Y-m-d') < Auth::user()->pengguna->menerimaDonor->first()->tanggal)}} --}}
      @if($donorall->count() != 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Penerima Donor</th>
            <th scope="col">Tanggal Donor</th>
            <th scope="col">Lokasi Donor</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($donorall as $donor)
          <tr data-toggle="collapse" data-target="{{'#dt'.$loop->iteration}}" class="clickable">
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$donor->id}}</td>
            <td>{{$donor->penerima->user->name}}</td>
            <td>{{$donor->tanggal}}</td>
            <td>{{$donor->nama_udd}}</td>
          </tr>
          <tr>
            <td colspan="5" class="py-3">
                <div id="{{'dt'.$loop->iteration}}" class="collapse text-center">
                  <h6 class="font-weight-bold">{{$donor->report->where('id_donor', $donor->id)->first()->judul}}</h6>
                  <p>{{$donor->report->where('id_donor', $donor->id)->first()->tgl}}</p>
                  <img src="{{(url($donor->report->where('id_donor', $donor->id)->first()->foto))}}" alt="" style="height:150px;" class="" >
                  <p>{{$donor->report->where('id_donor', $donor->id)->first()->pesan}}</p>

                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @else
      <div class="alert alert-danger text-center">Anda belum pernah melakukan pendonoran </div>
      @endif
    </div>
  </div>

</div>

@endsection
