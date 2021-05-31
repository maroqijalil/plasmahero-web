@if ($errors->any())
  <div class="row alert alert-danger">
    <div class="col-12  font-weight-bold">
        {{ __('Data yang anda masukan tidak valid, Coba lagi !') }}
    </div>
    <br>  
    <div class="col-12 text-danger">
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
    </div>
  </div>
@endif