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
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{ Session::get('success') }}
          @php
            Session::forget('success');
          @endphp
        </div>
      @endif
      <form method="POST" action="/admin/galeri" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Judul</label>
            <textarea class="form-control rounded-0 shadow-sm" rows="1" id="title" name="title">{{ old('title') }}</textarea>
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control rounded-0 shadow-sm" rows="10" id="description" name="description">{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="image">Gambar</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}"/>  
            @if ($errors->has('image'))
              <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
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