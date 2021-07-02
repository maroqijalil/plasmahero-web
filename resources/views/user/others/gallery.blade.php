@extends('user.layouts.app')

@section('content')
    <div class="container">
        <h1>Galeri Photo</h1>
        <div class="row">
            @foreach ($galleries as $gallery)
            <div class="col-md-4">
                <div class="thumbnail">
                <img src="{{asset($gallery->urlToImage)}}" alt="" style="width:100%">
                <p>{{$gallery->title}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
