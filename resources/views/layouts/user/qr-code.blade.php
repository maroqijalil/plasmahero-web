@extends('layouts.app')

@section('title', 'QR-Code Pendonoran')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12 text-center">
			<div class="visible-print text-center">
				<h1> QRCode Pendonoran anda </h1>
			
					<img src="{{ asset($qrCodePath)}}">
			</div>
    </div>
  </div>
</div>

@endsection