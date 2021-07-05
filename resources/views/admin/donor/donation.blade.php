@extends('admin.layouts.app')

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
				{{-- if error --}}
        @if(Session::has('error'))
            <div class="alert alert-success">
                {{Session::get('error')}}
            </div>
        @endif

        <form method="post" action="{{ route('store-pencocokan') }}" class="form card p-4">
          @csrf

          <input type="hidden" id="id_admin" name="id_admin" value="{{ Auth::user()->admin->id ?? '' }}">

          <legend class="form">Pencocokan</legend>
          <div class="form-group row mb-3">
            <label for="id_pendonor" class="col-4 col-form-label">ID Pendonor</label>
            <div class="col-8">
							<!-- <input class="form-control {{ $errors->has('id_pendonor') ? 'error' : '' }}" type="text" placeholder="ID Pendonor" id="id_pendonor" name="id_pendonor" value="{{ old('id_pendonor') }}"> -->
							<select class="form-control" id="id_pendonor" name="id_pendonor">
								@foreach ($users as $user)
								@if ($user->pengguna)
								@if ($user->pengguna->nama_tipe == 'pendonor')
								<option value="{{$user->pengguna->id}}">{{$user->pengguna->id}}:{{$user->name}}</option>
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
								@if ($user->pengguna)
								@if ($user->pengguna->nama_tipe == 'penerima')
								<option value="{{$user->pengguna->id}}">{{$user->pengguna->id}}:{{$user->name}}</option>
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

<div class="container my-2">
	<div class="row justify-content-center">
		<a href="#dicocokan" class="btn btn mt-4 btn-primary ml-50 float-right"><i class="fa fa-arrow-down"></i> Dicocokan</a> 
	</div>
</div>
<br>
<!-- row 2 -->
<!-- table pendonor & penerima -->
<div class="row justify-content-around">

	<div class="card col-5 ml-1 mr-1">
		<div class="card-header">
			<div class="row">
				<div class="col d-flex align-items-center">
					<h5 class="m-0">Pendonor</h5>
				</div>
				<div class="col-3">
					<div class="input-group">
						<input id="search-pendonor" onkeyup="searchPendonor()" type="text" class="form-control" placeholder="Cari sesuatu ..." aria-describedby="search-btn"/>
						<button class="btn btn-primary" id="search-btn">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped" id="table-pendonor">
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
					@if ($user->pengguna)
					@if ($user->pengguna->nama_tipe == 'pendonor')
					<tr>
						<th scope="row">{{$user->pengguna->id}}</th> <?php $counter++; ?>
						<td>{{ $user->name }}</td>
						<td>{{ $user->pengguna ? $user->pengguna->nama_tipe : $user->admin->id }}</td>
						<td>{{ $user->pengguna->kota }}</td>
					</tr>
					@endif
					@endif
					@endforeach
				</tbody>
			</table>
			<br>
			<div id="total-pendonor">total <?php echo ($counter-1); ?></div>
		</div>
	</div>

	<div class="card col-5 mr-1">
		<div class="card-header">
			<div class="row">
				<div class="col d-flex align-items-center">
					<h5 class="m-0">Penerima</h5>
				</div>
				<div class="col-3">
					<div class="input-group">
						<input id="search-penerima" onkeyup="searchPenerima()" type="text" class="form-control" placeholder="Cari sesuatu ..." aria-describedby="search-btn"/>
						<button class="btn btn-primary" id="search-btn">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped" id="table-penerima">
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
					@if ($user->pengguna)
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

<!-- row 3 -->
<!-- table pencocokan -->
<div class="container" id="dicocokan">
	<div class="row justify-content-center">
		<div class="card col-12">
			<div class="card-header">
				<div class="row">
					<div class="col d-flex align-items-center">
						<h5 class="m-0">Telah Dicocokan</h5>
					</div>
					<div class="col-3">
						<div class="input-group">
							<input id="search-pencocokan" onkeyup="searchPencocokan()" type="text" class="form-control" placeholder="Cari sesuatu ..." aria-describedby="search-btn"/>
							<button class="btn btn-primary" id="search-btn">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="card-body">
				<table id="table-pencocokan" class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th scope="col">No</th>
							<th scope="col">ID</th>
							<th scope="col">Pencocok</th>
							<th scope="col">Pendonor</th>
							<th scope="col">Penerima</th>
							<th scope="col">Action</th>
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
							<td>
								<?php $flag = true;
									foreach ($partisipans as $partisipan){
										if($partisipan->id_admin == $pencocokan->admin->user->id
												&& $partisipan->id_pendonor == $pencocokan->pendonor->user->id
												&& $partisipan->id_penerima == $pencocokan->penerima->user->id){
													$flag = false; 
													break;
												}
									}
								?>
								@if($flag)
									<a href="{{ route('chat-create', ['id' => $pencocokan->id]) }}" class="btn btn-primary"><i class="ni ni-chat-round"></i> Buat Chat</a>
								@else
									<a href="{{ route('chat', ['id' => $partisipan->id]) }}">Buka Chat</a>
								@endif
							</td>
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


@section('script')
<script>
function searchPencocokan() {
	searchMyTable("search-pencocokan", "table-pencocokan");
}

function searchPenerima() {
	searchMyTable("search-penerima", "table-penerima")
}

function searchPendonor() {
	searchMyTable("search-pendonor", "table-pendonor");
}

function searchMyTable(input_id, table_id) {
	var input, filter, table, tr, td, it1, txtValue, total = 0;
	input = document.getElementById(input_id);
	filter = input.value.toUpperCase();
	table = document.getElementById(table_id);
	tr = table.getElementsByTagName("tr");
	for (it1 = 0; it1 < tr.length; it1++) {
		td = tr[it1].getElementsByTagName("td");
		for (it2 = 0; it2 < td.length; it2++) {
			if (td[it2]) {
				txtValue = td[it2].textContent || td[it2].innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[it1].style.display = "";
					total++;
					break;
				} else {
					tr[it1].style.display = "none";
				}
			}
		}
	}
	document.getElementById("total-pendonor").innerText = total;
}
</script>
@endsection
