@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')

<!-- Modal gallery -->
<section class="">
  <section class="">
    <div class="container">
      <h1 class="display-5 text-center">Menambahkan Gambar ke Galeri</h1>
      <form method="POST" action="/admin/galeri" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <textarea class="form-control rounded-0 shadow-sm" rows="1" id="title" name="title"></textarea>
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control rounded-0 shadow-sm" rows="10" id="description" name="description"></textarea>
          </div>
          <div class="input-group mb-3 px-2 py-2 rounded-pill shadow-sm mx-auto">
            <input id="image" type="file" class="form-control border-0" name="image">
            <div class="input-group-append choose-file">
                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Pilih Gambar</small></label>
            </div>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn btn-dark rounded-pill">Tambah gambar</button>
          </div>
        </form>
    </div>
  </section>

@stop

@section('css')

@stop

@section('js')

@stop