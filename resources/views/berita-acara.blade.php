@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 text-center">
          <img src="{{asset('plasmaH2png.png')}}" alt="" class="img-fluid" width="15%">
      </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-12 text-center">
            <h3>Form Berita Acara Pendonoran</h3>
        </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-12">
        {{-- // if succes --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="" method="post" action="{{ route('berita-acara.store') }}">

          <!-- CROSS Site Request Forgery Protection -->
          @csrf

          <div class="form-group row mb-3">
            <label for="judul" class="col-2 col-form-label">Judul</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Judul Kegiatan" id="judul" name="judul">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="tgl" class="col-2 col-form-label">Tanggal Kegiatan</label>
            <div class="col-10">
              <input class="form-control" type="date" placeholder="Tanggal Kegiatan" id="tgl" name="tgl">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="pesan" class="col-2 col-form-label">Pesan dan Kesan</label>
            <div class="col-10">
              <textarea class="form-control" type="text-area" placeholder="Pesan dan Kesan" id="pesan" rows="5" name="pesan"></textarea>
            </div>
          </div>

          {{-- <div class="form-group row mb-3">
            <label for="foto" class="col-2 col-form-label">Foto Kegiatan</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Nama Foto Kegiatan" id="foto" name="foto">
            </div>
          </div> --}}

          <div class="form-group row mb-3">
            <label for="foto" class="col-2 col-form-label">Foto Kegiatan</label>
            <div class="col-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                <label class="custom-file-label" for="inputGroupFile03">Pilih file</label>
              </div>
            </div>
          </div>

          <input type="submit" name="send" value="Submit" class="btn btn-primary ml-50">
        </form>
      </div>
  </div>

    

</div>
@endsection