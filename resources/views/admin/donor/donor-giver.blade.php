@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<nav class="mb-2" aria-label="breadcumb" style="font-size: 14px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Donor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pendonor</li>
  </ol>
</nav>
<h3 class="font-weight-bold">Data Pendonor</h3>
@stop

@section('content')
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col d-flex align-items-center">
        <h5 class="m-0">Jumlah: </h5>
      </div>
      <div class="col-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari sesuatu ..." aria-describedby="search-btn"/>
          <button class="btn btn-primary" id="search-btn">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nama</th>
          <th scope="col">Role</th>
          <th scope="col">Alamat</th>
        </tr>
      </thead>
      <tbody>
          <?php $counter=1; ?>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->pengguna->id}}</th> <?php $counter++; ?>
            <td>{{ $user->name }}</td>
            <td>{{ $user->pengguna->nama_tipe }}</td>
            <td>{{ $user->pengguna->kota }}</td>
          </tr>
          @endforeach
      </tbody>
    </table>
    <div></div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
