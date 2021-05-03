@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="{{asset('plasmaH2png.png')}}" alt="" class="img-fluid" width="45%">
        </div>
    </div>

    <div class="row justify-content-center mb-5">
        <div class="col-md-6 text-center">
            <a href="{{ route('berita-acara.index') }}">
                <div class="btn btn-primary">Tambah Berita Acara</div>
            </a>
        </div>
        <div class="col-md-6 text-center">
            <a href="{{ route('berita-acara.show') }}">
                <div class="btn btn-primary">Daftar Berita Acara</div>
            </a>
        </div>
    </div>


</div>
@endsection

{{-- <x-app-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center ">
                <img src="{{asset('plasmaH2png.png')}}" alt="" class="img-fluid" width="45%">
            </div>
        </div>
    </div>
</x-app-layout> --}}

{{-- 
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Dashboard

@stop

@section('content')
    
Welcome to this beautiful admin panel.


@stop

@section('css')
    
@stop

@section('js')
    
@stop --}}
