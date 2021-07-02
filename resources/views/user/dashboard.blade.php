@extends('user.layouts.app')

@section('title', 'Home')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 text-center">
      <h2>Ini Halaman Landing Page Utama</h2>
      <img src="{{asset('plasmaH2png.png')}}" alt="" class="img-fluid" width="15%">
    </div>
  </div>
</div>

@endsection
