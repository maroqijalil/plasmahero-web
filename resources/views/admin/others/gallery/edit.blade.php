@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Edit Dokumentasi</h3>
                </div>
                <div class="form ml-4 mr-4">
                    <form method="POST" enctype="multipart/form-data" action="/admin/galeri/{{$galeri->id}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="judul" class="form-control-label">Judul</label>
                            <input class="form-control" type="text" value="{{$galeri->judul}}" id="judul" name="judul">
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-control-label">deskripsi</label>
                            <textarea rows="5" class="form-control" type="text" id="deskripsi" name="deskripsi">{{$galeri->deskripsi}}</textarea>
                            @if ($errors->has('deskripsi'))
                                <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="foto" class="form-control-label">Foto</label>
                            <input class="form-control" type="file" value="{{$galeri->foto}}" id="foto" name="foto">
                            @if ($errors->has('foto'))
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
