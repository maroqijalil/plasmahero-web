@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
Dashboard

@stop

@section('content')
<!-- row 1 -->
<!-- form -->
<div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        {{-- if success --}}
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('store-pencocokan') }}">
          @csrf

          <input type="hidden" id="id_admin" name="id_admin" value="{{ Auth::user()->admin->id }}">

          <legend class="form">Pencocokan</legend>
          <div class="form-group row mb-3">
            <label for="id_pendonor" class="col-4 col-form-label">ID Pendonor</label>
            <div class="col-8">
							<!-- <input class="form-control {{ $errors->has('id_pendonor') ? 'error' : '' }}" type="text" placeholder="ID Pendonor" id="id_pendonor" name="id_pendonor" value="{{ old('id_pendonor') }}"> -->
							<select class="form-control" id="id_pendonor" name="id_pendonor">
								@foreach ($users as $user)
								@if ($user->role == 'pengguna')
								@if ($user->pengguna->nama_tipe == 'pendonor')
								<option value="{{$user->pengguna->id}}">{{$user->pengguna->id}}</option>
								@endif
								@endif
								@endforeach
							</select>

              @if ($errors->has('id_pendonor'))
              <div class="error">
                  {{ $errors->first('id_pendonor') }}
              </div>
              @endif
            </div>
          </div>

          <div class="form-group row mb-3">
            <label for="id_penerima" class="col-4 col-form-label">ID Penerima</label>
            <div class="col-8">
							<!-- <input class="form-control {{ $errors->has('id_penerima') ? 'error' : '' }}" type="text" placeholder="ID Penerima" id="id_penerima" name="id_penerima" value="{{ old('id_penerima') }}"> -->
							<select class="form-control" id="id_penerima" name="id_penerima">
								@foreach ($users as $user)
								@if ($user->role == 'pengguna')
								@if ($user->pengguna->nama_tipe == 'penerima')
								<option value="{{$user->pengguna->id}}">{{$user->pengguna->id}}</option>
								@endif
								@endif
								@endforeach
							</select>
              <!-- Error -->
              @if ($errors->has('id_penerima'))
              <div class="error">
                  {{ $errors->first('id_penerima') }}
              </div>
              @endif
            </div>
          </div>
  
          <input type="submit" name="send" value="Submit" class="btn mt-4 btn-primary ml-50 float-right">
        </form>
      </div>
  </div>


</div>

<br>	
<!-- row 2 -->
<!-- table pendonor & penerima -->
<div class="container">
	<div class="row justify-content-around">

		<div class="card col-5">
			<div class="card-header">
				<div class="row">
					<div class="col d-flex align-items-center">
						<h5 class="m-0">Pendonor</h5>
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
							<th scope="col">Role</th>
							<th scope="col">Alamat</th>
						</tr>
					</thead>
					<tbody>
						<?php $counter=1; ?>
						@foreach ($users as $user)
						@if ($user->role == 'pengguna')
						@if ($user->pengguna->nama_tipe == 'pendonor')
						<tr>
							<th scope="row">{{$user->pengguna->id}}</th> <?php $counter++; ?>
							<td>{{ $user->name }}</td>
							<td>{{ $user->role=='pengguna' ? $user->pengguna->nama_tipe : $user->admin->id }}</td>
							<td>{{ $user->pengguna->kota }}</td>
						</tr>
						@endif
						@endif
						@endforeach
					</tbody>
				</table>
				<br>
				<div>total <?php echo ($counter-1); ?></div>
			</div>
		</div>

		<div class="card col-5">
			<div class="card-header">
				<div class="row">
					<div class="col d-flex align-items-center">
						<h5 class="m-0">Penerima</h5>
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
							<th scope="col">Role</th>
							<th scope="col">Alamat</th>
						</tr>
					</thead>
					<tbody>
					<?php $counter=1; ?>
						@foreach ($users as $user)
						@if ($user->role == 'pengguna')
						@if ($user->pengguna->nama_tipe == 'penerima')
						<tr>
							<th scope="row">{{$user->pengguna->id}}</th> <?php $counter++; ?>
							<td>{{$user->name}}</td>
							<td>{{ $user->role=='pengguna' ? $user->pengguna->nama_tipe : $user->admin->id }}</td>
							<td>Surabaya</td>
						</tr>
						@endif
						@endif
						@endforeach
					</tbody>
				</table>
				<br>
				<div>total <?php echo ($counter-1); ?></div>
			</div>
		</div>

	</div>
</div>

<!-- row 3 -->
<!-- table pencocokan -->
<div class="container">
	<div class="row justify-content-center">
		<div class="card col-12">
			<div class="card-header">
				<div class="row">
					<div class="col d-flex align-items-center">
						<h5 class="m-0">Telah Dicocokan</h5>
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
							<th scope="col">No</th>
							<th scope="col">ID</th>
							<th scope="col">Pencocok</th>
							<th scope="col">Pendonor</th>
							<th scope="col">Penerima</th>
						</tr>
					</thead>
					<tbody>
					<?php $counter=1; ?>
						@foreach ($pencocokans as $pencocokan)
						<tr>
							<th scope="row">{{$counter++}}</th>
							<td>{{$pencocokan->id}}</th>
							<td>{{$pencocokan->admin->user->name}}</td>
							<td>{{$pencocokan->pendonor->user->name}}</td>
							<td>{{$pencocokan->penerima->user->name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<br>
				<div>total <?php echo ($counter-1); ?></div>
			</div>
		</div>
	</div> 
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop
