@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
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
      <div class="form-group col-md-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama" value="{{$userData->name}}" name="name">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Masukkan Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="emailku@mail.com" value="{{$userData->email}}" readonly name="email">
      </div>
      <div class="form-group col-md-6">
        <label for="password">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password_confirmation">
      </div>
    </div>
    <button type="submit" class="btn btn-primary float-right">Perbarui Data</button>
  </form>

  <div class="row-md-6 float-left">
    <label>
      <a href="/detail-pengguna">Detail Data Diri Pengguna</a>
    </label>
  </div>

</div>

@endsection