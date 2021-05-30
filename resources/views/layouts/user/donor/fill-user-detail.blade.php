@extends('layouts.app')

@section('title', 'Detail Pendonor')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        {{-- if succes --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form action="" method="post" action="{{ route('fill-report.store') }}">
          @csrf

          <input type="hidden" id="id_user" name="id_user" value="{{ Auth::user()->id }}">

          <!-- data diri -->
          <legend class="form">Data Diri</legend>
          <div class="form-group row mb-3">
            <label for="no_hp" class="col-2 col-form-label">No. WhatsApp</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor WhatsApp" id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
  
              <!-- Error -->
              @if ($errors->has('no_hp'))
              <div class="error">
                  {{ $errors->first('no_hp') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="alamat" class="col-2 col-form-label">Alamat</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ old('alamat') }}">
  
              <!-- Error -->
              @if ($errors->has('alamat'))
              <div class="error">
                  {{ $errors->first('alamat') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="kelurahan" class="col-2 col-form-label">Kelurahan</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}">
  
              <!-- Error -->
              @if ($errors->has('kelurahan'))
              <div class="error">
                  {{ $errors->first('kelurahan') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
  
              <!-- Error -->
              @if ($errors->has('kecamatan'))
              <div class="error">
                  {{ $errors->first('kecamatan') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="kota" class="col-2 col-form-label">Kota</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="{{ old('kota') }}">
  
              <!-- Error -->
              @if ($errors->has('kota'))
              <div class="error">
                  {{ $errors->first('kota') }}
              </div>
              @endif
            </div>
          </div>
          
          <div class="form-group row mb-3">
            <label for="nama_tipe" class="col-2 col-form-label">Nama Tipe</label>
            <div class="col-10">
              <select class="form-control" id="nama_tipe" name="nama_tipe">
                <option value="pendonor" selected>Pendonor</option>
                <option value="penerima">Penerima</option>
              </select>
            </div>
          </div>
          <br>
  
          <!-- keperluan donor -->
          <legend>Keperluan Donor</legend>
          <div class="form-group row mb-3">
            <label for="usia" class="col-2 col-form-label">Usia</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('usia') ? 'error' : '' }}" type="number" placeholder="Usia Pendonor" id="usia" name="usia" value="{{ old('usia') }}">
  
              <!-- Error -->
              @if ($errors->has('usia'))
              <div class="error">
                  {{ $errors->first('usia') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
            <div class="col-10">
              <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                <option value="L" selected>Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="gol_darah" class="col-2 col-form-label">Golongan Darah</label>
            <div class="col-10">
              <select class="form-control {{ $errors->has('rhesus') ? 'error' : '' }}" id="gol_darah" name="gol_darah">
                <option value="a" selected>A</option>
                <option value="b">B</option>
                <option value="ab">AB</option>
                <option value="o">O</option>
              </select>

              <!-- Error -->
              @if ($errors->has('gol_darah'))
              <div class="error">
                  {{ $errors->first('gol_darah') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="rhesus" class="col-2 col-form-label">Rhesus</label>
            <div class="col-10">
              <select class="form-control {{ $errors->has('rhesus') ? 'error' : '' }}" id="rhesus" name="rhesus">
                <option value="positif" selected>Positif</option>
                <option value="negatif">Negatif</option>
              </select>
  
              <!-- Error -->
              @if ($errors->has('rhesus'))
              <div class="error">
                  {{ $errors->first('rhesus') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="berat_badan" class="col-2 col-form-label">Berat Badan</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('berat_badan') ? 'error' : '' }}" type="number" placeholder="Berat Badan" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}">
  
              <!-- Error -->
              @if ($errors->has('berat_badan'))
              <div class="error">
                  {{ $errors->first('berat_badan') }}
              </div>
              @endif
            </div>
          </div>
  
          <div class="form-group row mb-3">
            <label for="tanggal_swab" class="col-2 col-form-label">Tanggal Swab</label>
            <div class="col-10">
              <input class="form-control {{ $errors->has('tanggal_swab') ? 'error' : '' }}" type="date" placeholder="Tanggal Swab" id="tanggal_swab" name="tanggal_swab" value="{{ old('tanggal_swab') }}">
  
              <!-- Error -->
              @if ($errors->has('tanggal_swab'))
              <div class="error">
                  {{ $errors->first('tanggal_swab') }}
              </div>
              @endif
            </div>
          </div>
  
          <input type="submit" name="send" value="Submit" class="btn mt-4 btn-primary ml-50 float-right">
        </form>
      </div>
  </div>
</div>

@endsection
