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
            <h3>Form Detail Pendonor</h3>
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

        <form action="" method="post" action="{{ route('fill-detail-giver.store') }}">
          @csrf

          <div class="form-group row mb-3">
            <label for="usia" class="col-2 col-form-label">Usia</label>
            <div class="col-10">
              <input class="form-control" type="number" placeholder="Usia Pendonor" id="usia" name="usia">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
            <div class="col-10">
              <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" aria-label="Default select example">
                <option value="L" selected>Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="gol_dar" class="col-2 col-form-label">Golongan Darah</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Golongan Darah" id="gol_dar" name="gol_dar">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="rhesus" class="col-2 col-form-label">Rhesus</label>
            <div class="col-10">
              <input class="form-control" type="text" placeholder="Rhesus" id="rhesus" name="rhesus">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="berat_badan" class="col-2 col-form-label">Berat Badan</label>
            <div class="col-10">
              <input class="form-control" type="number" placeholder="Berat Badan" id="berat_badan" name="berat_badan">
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="tgl_swab" class="col-2 col-form-label">Tanggal Swab</label>
            <div class="col-10">
              <input class="form-control" type="date" placeholder="Tanggal Swab" id="tgl_swab" name="tgl_swab">
            </div>
          </div>

          <input type="submit" name="send" value="Submit" class="btn btn-primary ml-50">
        </form>
      </div>
  </div>
</div>
@endsection