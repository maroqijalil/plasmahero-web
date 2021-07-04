@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<nav class="mb-2" aria-label="breadcumb" style="font-size: 14px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Donor</a></li>
    <li class="breadcrumb-item active" aria-current="page">Unit Donor</li>
  </ol>
</nav>
<h3 class="font-weight-bold">Data Unit Donor</h3>
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

  <div class="container-fluid d-flex justify-content-end mt-4 mb-2">
    <button type="button" class="btn btn-success col-4" data-toggle="modal" data-target="#addModal">Tambah Unit</button>
  </div>
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Unit Donor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="{{ route('admin.donor.unit.store') }}">
            @csrf
    
            <div class="form-group row mb-3">
              <label for="no_hp" class="col-2 col-form-label">Nama Unit</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nama Unit" id="nama_unit" name="nama_unit" value="">
    
                <!-- Error -->
                @if ($errors->has('no_hp'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('no_hp') }}
                </div>
                @endif
              </div>
            </div>
    
            <div class="form-group row mb-3">
              <label for="no_hp" class="col-2 col-form-label">No. Telepon</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor Telepon" id="no_telp" name="no_telp" value="">
    
                <!-- Error -->
                @if ($errors->has('no_hp'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('no_hp') }}
                </div>
                @endif
              </div>
            </div>
    
            <div class="form-group row mb-3">
              <label for="alamat" class="col-2 col-form-label">Alamat</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="">
    
                <!-- Error -->
                @if ($errors->has('alamat'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('alamat') }}
                </div>
                @endif
              </div>
            </div>
    
            <div class="form-group row mb-3">
              <label for="kelurahan" class="col-2 col-form-label">Kelurahan</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="">
    
                <!-- Error -->
                @if ($errors->has('kelurahan'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('kelurahan') }}
                </div>
                @endif
              </div>
            </div>
    
            <div class="form-group row mb-3">
              <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="">
    
                <!-- Error -->
                @if ($errors->has('kecamatan'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('kecamatan') }}
                </div>
                @endif
              </div>
            </div>
    
            <div class="form-group row mb-3">
              <label for="kota" class="col-2 col-form-label">Kota</label>
              <div class="col-10">
                <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="">
    
                <!-- Error -->
                @if ($errors->has('kota'))
                <div class="error text-danger" style="font-size: 12px;">
                    {{ $errors->first('kota') }}
                </div>
                @endif
              </div>
            </div>
    
            <button type="submit" class="btn mt-4 btn-primary ml-50 float-right">Tambahkan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="card-header">
    <div class="row">
      <div class="col d-flex align-items-center">
        <h5 class="m-0">Jumlah: {{ $units->count() }}</h5>
      </div>
      <div class="col-3">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari sesuatu ..." aria-describedby="search-btn"/>
          <button class="btn btn-primary" id="search-btn">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nama</th>
          <th scope="col">Alamat</th>
          <th scope="col">No Telepon</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($units as $unit)
          <tr>
            <th scope="row">{{ $unit->id }}</th>
            <td>{{ $unit->nama_unit }}</td>
            <td>{{ $unit->alamat }}</td>
            <td>{{ $unit->no_telp }}</td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $unit->id }}">Edit</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{ $unit->id }}">Delete</button>
            </td>
          </tr>
          <div class="modal fade" id="editModal-{{ $unit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Unit Donor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form role="form" method="POST" action="{{ route('admin.donor.unit.update', ['id' => $unit->id]) }}">
                    @method('PUT')
                    @csrf
            
                    <div class="form-group row mb-3">
                      <label for="no_hp" class="col-2 col-form-label">Nama Unit</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nama Unit" id="nama_unit" name="nama_unit" value="{{ $unit->nama_unit }}">
            
                        <!-- Error -->
                        @if ($errors->has('no_hp'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('no_hp') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <div class="form-group row mb-3">
                      <label for="no_hp" class="col-2 col-form-label">No. Telepon</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('no_hp') ? 'error' : '' }}" type="text" placeholder="Nomor Telepon" id="no_telp" name="no_telp" value="{{ $unit->no_telp }}">
            
                        <!-- Error -->
                        @if ($errors->has('no_hp'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('no_hp') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <div class="form-group row mb-3">
                      <label for="alamat" class="col-2 col-form-label">Alamat</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('alamat') ? 'error' : '' }}" type="text" placeholder="alamat" id="alamat" name="alamat" value="{{ $unit->alamat }}">
            
                        <!-- Error -->
                        @if ($errors->has('alamat'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('alamat') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <div class="form-group row mb-3">
                      <label for="kelurahan" class="col-2 col-form-label">Kelurahan</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('kelurahan') ? 'error' : '' }}" type="text" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="{{ $unit->kelurahan }}">
            
                        <!-- Error -->
                        @if ($errors->has('kelurahan'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('kelurahan') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <div class="form-group row mb-3">
                      <label for="kecamatan" class="col-2 col-form-label">Kecamatan</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('kecamatan') ? 'error' : '' }}" type="text" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="{{ $unit->kecamatan }}">
            
                        <!-- Error -->
                        @if ($errors->has('kecamatan'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('kecamatan') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <div class="form-group row mb-3">
                      <label for="kota" class="col-2 col-form-label">Kota</label>
                      <div class="col-10">
                        <input class="form-control {{ $errors->has('kota') ? 'error' : '' }}" type="text" placeholder="Kota" id="kota" name="kota" value="{{ $unit->kota }}">
            
                        <!-- Error -->
                        @if ($errors->has('kota'))
                        <div class="error text-danger" style="font-size: 12px;">
                            {{ $errors->first('kota') }}
                        </div>
                        @endif
                      </div>
                    </div>
            
                    <button type="submit" class="btn mt-4 btn-primary ml-50 float-right">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade" id="deleteModal-{{ $unit->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Unit Donor</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <form action="{{ route('admin.donor.unit.delete', ['id' => $unit->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Ya, hapus data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </tbody>
    </table>
    <div></div>
  </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
