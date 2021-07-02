@extends('user.layouts.app')

@section('title', 'Form Pendonoran')

@section('content')
<div class="container">

  <div class="row">

    <div class="col-md-4 kiri mb-4">
      <h2 class="text-center font-weight-bold">Status Donor</h2>
      <div class="p-1"></div>
      <div class="card mt-4">
        <div class="card-body">
          <label for="tipe" class="font-weight-bold mr-4">Tipe   : </label>
          <div class="alert alert-primary" id="tipe">Pendonor</div>
          <br>
          <label for="status" class="font-weight-bold mr-4">Status   : </label>
          <div class="alert alert-warning" id="status">Menunggu Validasi Detail Pengguna</div>
        </div>
      </div>
    </div>

    <div class="col-md-8 kanan">
      <h2 class="text-center font-weight-bold">Pelaksanaan Pendonoran</h2>

      <x-validation-errors class="mb-4" :errors="$errors"></x-validation-errors>
      <form method="POST" action="/pendonoran">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="tanggal">Masukkan tanggal</label>
            <input type="date" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal">
          </div>
          <div class="form-group col-md-12">
            <label for="waktu">Masukkan waktu</label>
            <input type="time" class="form-control" id="waktu" placeholder="waktu" name="waktu">
          </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
      </form>
    </div>

  </div>

</div>

@endsection
