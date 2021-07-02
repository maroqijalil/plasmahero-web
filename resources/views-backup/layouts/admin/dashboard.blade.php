@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Dashboard

@stop

@section('content')
<a href="{{ url('/admin') }}">dashboard</a>
<a href="{{ url('/admin/pendonoran') }}">pendonoran</a>
<a href="{{ url('/admin/chat') }}">chat</a>
<a href="{{ url('/admin/konsultasi') }}">konsultasi</a>
<a href="{{ url('/admin/akun') }}">akun</a>
<a href="{{ url('/admin/pengaturan') }}">pengaturan</a>

<a href="{{ url('/admin/pendonor') }}">pendonor</a>
<a href="{{ url('/admin/pemohon') }}">pemohon</a>

<a href="{{ url('/admin/galeri') }}">galeri</a>

<a href="{{ url('/admin/berita-acara') }}">berita-acara</a>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
