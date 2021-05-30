@extends('layouts.app')

@section('title', 'Berita Acara')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
          <img src="{{asset('plasmaH2png.png')}}" alt="" class="img-fluid" width="15%">
      </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12 text-center">
            <h3>Daftar Berita Acara Pendonoran</h3>
        </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Pesan</th>
          <th scope="col">Foto</th>
          <th scope="col">ID Pengguna</th>


        </tr>
      </thead>
      <tbody>
        @foreach ($reports as $report)
        <tr>
          <th scope="row">#</th>
          <td>{{$report->judul}}</td>
          <td>{{$report->tgl}}</td>
          <td>{{$report->pesan}}</td>
          <td>{{$report->foto}}</td>
          <td>{{$report->id_user}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>

</div>

@endsection