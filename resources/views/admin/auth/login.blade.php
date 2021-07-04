@extends('admin.layouts.app', ['auth' => false])

@section('title', 'Plasmahero Admin | Masuk')

@section('content')
<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header py-5 my-auto">
			<div class="container">
				<div class="header-body text-center">
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-6 col-md-8 px-5">
							<img height="100" src="{{ asset('img/plasmaH2png.png') }}">
							<h1 class="text-primary">Selamat Datang Admin!</h1>
							<p class="text-lead text-primary">Masukkan Email dan Password Anda!</p>
						</div>
					</div>
				</div>
			</div>
    </div>
    <!-- Page content -->
    <div class="container pb-5">
    <div class="row justify-content-center">
			<div class="col-lg-5 col-md-7">
        <div class="card bg-secondary border-0 mb-0">
					<div class="card-body px-lg-5 py-lg-5">
						<form method="POST" action="{{ route('admin.login.store') }}">
							@csrf
							<div class="form-group mb-3">
								<div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-email-83"></i></span>
									</div>
									<input class="form-control {{ $errors->has('email') ? 'error' : '' }}" type="email" placeholder="email" id="email" name="email" value="{{ old('email') }}">
			
									<!-- Error -->
									@if ($errors->has('email'))
									<div class="error text-danger" style="font-size: 12px;">
											{{ $errors->first('email') }}
									</div>
									@endif
								</div>
							</div>
							<div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
									<div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
									</div>
									<input class="form-control {{ $errors->has('password') ? 'error' : '' }}" type="password" placeholder="password" id="password" name="password" value="{{ old('password') }}">
			
									<!-- Error -->
									@if ($errors->has('password'))
									<div class="error text-danger" style="font-size: 12px;">
											{{ $errors->first('password') }}
									</div>
									@endif
                </div>
							</div>
							<div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id="remember_me" type="checkbox" name="remember">
                <label class="custom-control-label" for="remember_me">
									<span class="text-muted">Remember me</span>
                </label>
							</div>
							<div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Masuk</button>
							</div>
            </form>
					</div>
        </div>
        <div class="row mt-3">
					<div class="col-6">
            <a href="#" class="text-primary-light"><small>Lupa Password?</small></a>
					</div>
					<div class="col-6 text-right">
            <a href="{{ route('admin.register') }}" class="text-primary-light"><small>Buat Akun Baru</small></a>
					</div>
        </div>
			</div>
    </div>
	</div>
</div>
<!-- Footer -->
@stop

@section('css')
<style>
	#ofBar {
		background: #1A1E21;
		z-index: 999999999;
		font-size: 16px;
		color: #fff;
		padding: 16px;
		font-weight: 400;
		display: flex;
		justify-content: space-between;
		align-items: center;
		position: fixed;
		bottom: 20px;
		width: 80%;
		border-radius: 5px;
		left: 0;
		right: 0;
		margin-left: auto;
		margin-right: auto;
		box-shadow: 0 13px 27px -5px rgba(50,50,93,0.25), 0 8px 16px -8px rgba(0,0,0,0.3), 0 -6px 16px -6px rgba(0,0,0,0.025);
	}

	#ofBar-logo img {
		height: 50px;
	}

	#ofBar-content {
		display: inline;
		padding: 0 15px;
	}

	#ofBar-right {
		display: flex;
		align-items: center;
	}

	#ofBar b {
		font-size: 15px !important;
	}
	#count-down {
		display: initial;
		padding-left: 10px;
		font-weight: bold;
		font-size: 20px;
	}
	#close-bar {
		font-size: 17px;
		opacity: 0.5;
		cursor: pointer;
	}
	#close-bar:hover{
		opacity: 1;
	}
	#btn-bar {
		background-color: #fff;
		color: #40312d;
		border-radius: 4px;
		padding: 10px 20px;
		font-weight: bold;
		text-transform: uppercase;
		text-align: center;
		font-size: 12px;
		opacity: .95;
		margin-right: 20px;
		box-shadow: 0 5px 10px -3px rgba(0,0,0,.23), 0 6px 10px -5px rgba(0,0,0,.25);
	}
	#btn-bar:hover{
		opacity: 0.9;
	}
	#btn-bar{
		opacity: 1;
	}

	#btn-bar span, #ofBar-content span {
		color: red;
		font-weight: 700;
	}

	#oldPriceBar {
		text-decoration: line-through;
		font-size: 16px;
		color: #fff;
		font-weight: 400;
		top: 2px;
		position: relative;
	}
	#newPrice{
		color: #fff;
		font-size: 19px;
		font-weight: 700;
		top: 2px;
		position: relative;
		margin-left: 7px;
	}

	#fromText {
		font-size: 15px;
		color: #fff;
		font-weight: 400;
		margin-right: 3px;
		top: 0px;
		position: relative;
	}

	@media(max-width: 991px){
		#count-down {
			display: block;
			margin-top: 15px;
			text-align: center;
			font-size: 19px;
		}
	}
	@media (max-width: 768px) {
		
		#ofBar {
			flex-direction: column;
			align-items: normal;
		}

		#ofBar-content {
			margin: 15px 0;
			text-align: center;
			font-size: 18px;
		}

		#ofBar-right {
			justify-content: flex-end;
		}
	}
</style>
@stop

@section('js')
		
@stop