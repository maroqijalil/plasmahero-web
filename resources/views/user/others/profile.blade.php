@extends('user.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">

  @if(Session::has('eSent'))
    <div class="alert alert-success">
      {{Session::get('eSent')}}
    </div>
  @endif

  <div class="row">
    <div class="col-md-4 kiri mb-4">
      <h2 class="text-center font-weight-bold">Dashboard</h2>
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

          @elseif(Auth::user()->pengguna->status == 'p' && Auth::user()->pengguna->mendonor->first()->tanggal != null)
          <div class="alert alert-danger" id="status">
            Jadwal donor anda : {{Auth::user()->pengguna->mendonor->first()->tanggal}}

          @elseif(Auth::user()->pengguna->status == 'p' && Auth::user()->pengguna->menerimaDonor->first()->tanggal != null)
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
          @endif
        </div>
        @else
        <div class="card-body">
          <div class="alert alert-danger text-center">Anda belum memngisi detail pengguna. Isi <a href="/detail-pengguna">disini</a> </div>
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

      <x-validation-errors class="mb-4" :errors="$errors"></x-validation-errors>
      <form method="POST" action="{{route('profile.update')}}">
        @method('patch')
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
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

      <label>
        <a href="/detail-pengguna">Detail Data Diri Pengguna</a>
      </label>
    </div>

  </div>
  <div class="row">
    <div class="col">
      <h2 class="text-center font-weight-bold mb-4">Histori Donor</h2>
      {{-- {{dump(date('Y-m-d') < Auth::user()->pengguna->menerimaDonor->first()->tanggal)}} --}}
      @if($donorall->count() != 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Penerima Donor</th>
            <th scope="col">Tanggal Donor</th>
            <th scope="col">Lokasi Donor</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($donorall as $donor)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$donor->penerima->user->name}}</td>
            <td>{{$donor->tanggal}}</td>
            <td>{{$donor->nama_udd}}</td>
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
