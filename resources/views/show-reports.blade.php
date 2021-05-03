@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="mt-5">Daftar Berita Acara</h1>
      <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pesan</th>
            <th scope="col">Foto</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reports as $rep)
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$rep->judul}}</td>
            <td>{{$rep->tgl}}</td>
            <td>{{$rep->pesan}}</td>
            <td>{{$rep->foto}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection