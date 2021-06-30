@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Dashboard

@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        {{-- if success --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('store-admin-akun') }}">
          @csrf

					<input type="hidden" name="id_user" value="{{Auth::user()->id}}">
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
              <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ Auth::user()->admin ? Auth::user()->admin->alamat : '' }}">
  
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
  
          <input type="submit" name="send" value="Submit" class="btn mt-4 btn-primary ml-50 float-right">
        </form>
      </div>
  </div>


</div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop
