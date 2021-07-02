@extends('layouts.app')

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
      <h2 class="text-center font-weight-bold">Status Donor</h2>
      <div class="p-1"></div>
      <div class="card mt-4">
        <div class="card-body">
          <label for="tipe" class="font-weight-bold mr-4">Tipe   : </label>
          <div class="alert alert-primary" id="tipe">{{ Auth::user()->pengguna->nama_tipe ?? '' }}</div>
          <br>
          <label for="status" class="font-weight-bold mr-4">Status   : </label>
          <div class="alert alert-warning" id="status">
            @if(Auth::user()->pengguna->id_admin ?? false)
              Diverifikasi
            @else
              Menunggu Validasi Detail Pengguna
            @endif
          </div>
        </div>
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
        <a href="{{ route('user-detail') }}">Detail Data Diri Pengguna</a>
      </label>
    </div>

  </div>

</div>

@endsection