@extends('user.layouts.app')
@section('content')
    <div class="container">
        <form action="/cerita" method="POST">
            @csrf
            <div class="form-group col-md-12">
                <label for="nama">cerita</label>
                <textarea type="text" minlength="5" class="form-control" id="cerita" value="" name="cerita"></textarea>
                @if ($errors->has('deskripsi'))
                    <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary float-right">Tambah cerita</button>
        </form>
    </div>
@endsection
