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

        <form action="" method="post" action="{{ route('fill-report.store') }}">

          <!-- CROSS Site Request Forgery Protection -->
          @csrf

          <div class="form-group row mb-3">
            <label for="judul" class="col-2 col-form-label">Judul</label>
            <div class="col-10">
              <input class="form-control @error('judul') is-invalid @enderror" type="text" placeholder="Judul Kegiatan" id="judul" name="judul" value="{{old('judul')}}">
              @if ($errors->has('judul'))
                <div class="text-danger">{{ $errors->first('judul') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="tgl" class="col-2 col-form-label">Tanggal Kegiatan</label>
            <div class="col-10">
              <input class="form-control @error('tgl') is-invalid @enderror" type="date" placeholder="Tanggal Kegiatan" id="tgl" name="tgl" value="{{old('tgl')}}">
              @if ($errors->has('tgl'))
              <div class="text-danger">{{ $errors->first('tgl') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="pesan" class="col-2 col-form-label">Pesan dan Kesan</label>
            <div class="col-10">
              <textarea class="form-control @error('pesan') is-invalid @enderror" type="text-area" placeholder="Pesan dan Kesan" id="pesan" rows="5" name="pesan"></textarea>
              @if ($errors->has('pesan'))
                <div class="text-danger">{{ $errors->first('pesan') }}</div>
              @endif
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="foto" class="col-2 col-form-label">Foto Kegiatan</label>
            <div class="col-10">
              <input class="form-control @error('foto') is-invalid @enderror" type="text" placeholder="Nama Foto Kegiatan" id="foto" name="foto" value="{{old('foto')}}">
              @if ($errors->has('foto'))
                <div class="text-danger">{{ $errors->first('foto') }}</div>
              @endif
            </div>
          </div>

          {{-- <div class="form-group row mb-3">
            <label for="foto" class="col-2 col-form-label">Foto Kegiatan</label>
            <div class="col-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                <label class="custom-file-label" for="inputGroupFile03">Pilih file</label>
              </div>
            </div>
          </div> --}}

          <input type="submit" name="send" value="Submit" class="btn btn-primary ml-50">
        </form>
      </div>
  </div>
</div>

@endsection