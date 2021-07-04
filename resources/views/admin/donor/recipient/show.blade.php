@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<nav class="mb-2" aria-label="breadcumb" style="font-size: 14px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Donor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Penerima Donor</li>
  </ol>
</nav>
<h3 class="font-weight-bold">Data Penerima Donor</h3>
@stop

@section('content')
<div class="card">
  @if(Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @elseif(Session::has('error'))
  <div class="alert alert-danger">
    {{Session::get('error')}}
  </div>
  @endif

  <div class="card-body">
    @php
      $pengguna = $user->pengguna;
    @endphp
    <legend class="form">Data Diri</legend>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th scope="row">Nama</th>
          <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <th scope="row">No. WhatsApp</th>
          <td>{{ $pengguna->no_hp }}</td>
        </tr>
        <tr>
          <th scope="row">Alamat</th>
          <td>{{ $pengguna->alamat }}</td>
        </tr>
        <tr>
          <th scope="row">Kelurahan</th>
          <td>{{ $pengguna->kelurahan }}</td>
        </tr>
        <tr>
          <th scope="row">Kecamatan</th>
          <td>{{ $pengguna->kecamatan }}</td>
        </tr>
        <tr>
          <th scope="row">Kota</th>
          <td>{{ $pengguna->kota }}</td>
        </tr>
      </tbody>
    </table>

    <legend class="form">Keperluan Donor</legend>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th scope="row">Usia</th>
          <td>{{ $user->usia }}</td>
        </tr>
        <tr>
          <th scope="row">Jenis Kelamin</th>
          <td>{{ $pengguna->jenis_kelamin }}</td>
        </tr>
        <tr>
          <th scope="row">Golongan Darah</th>
          <td>{{ $pengguna->gol_darah }}</td>
        </tr>
        <tr>
          <th scope="row">Rhesus</th>
          <td>{{ $pengguna->rhesus }}</td>
        </tr>
        <tr>
          <th scope="row">Berat Badan</th>
          <td>{{ $pengguna->berat_badan }}</td>
        </tr>
        <tr>
          <th scope="row">Tanggal Swab</th>
          <td>{{ $pengguna->tanggal_swab }}</td>
        </tr>
      </tbody>
    </table>
    <div class="mt-4 text-center">
      <button data-toggle="modal" data-target="#confirmModal" class="btn btn-primary">Verifikasi Data</button>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <form action="{{ route('admin.donor.recipient.update', ['id' => $pengguna->id]) }}" method="POST">
              @method('PUT')
              @csrf
              <input type="hidden" name="id_admin" value="{{ Auth::user()->admin->id ?? Auth::user()->id }}">
              <button type="submit" class="btn btn-primary">Ya, verifikasi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
