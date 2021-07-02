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

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
