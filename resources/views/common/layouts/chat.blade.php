@extends('common.layouts.chat-layout')

@section('chat')
<div class="row flex-row chat">
  <div class="col-lg-4">
    <div class="card bg-secondary">
      <form class="card-header mb-3 w-100">
        <div class="form-group w-100 mb-0">
          <div class="form-group input-group-alternative mb-0 input-group" placeholder="Search Group">
            <!----><!----><!---->
            <input aria-describedby="addon-right addon-left" placeholder="Search contact" class="form-control">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="ni ni-zoom-split-in"></i>
              </span>
            </div>
            <!---->
          </div>
        </div>
      </form>
      <div class="list-group list-group-chat list-group-flush">

      @if(!empty($partisipans))
      @foreach($partisipans as $partisipan)
        <a href="{{ route('chat', ['id' => $partisipan->id]) }}" class="list-group-item {{ $partisipan->id == $active_chat ? 'active bg-gradient-primary' : ''}}">
          <div class="media align-items-center">
            <i class="ni ni-single-02 avatar"></i>
            <div class="media-body ml-2 align-items-center">
              <div class="justify-content-between align-items-center">
                <h5 class="mb-0 {{ $partisipan->id == $active_chat ? 'text-white' : '' }}"> 
                  {{ $partisipan->admin->name }},
                  {{ $partisipan->pendonor->name }},
                  {{ $partisipan->penerima->name }}
                  <span class="badge badge-success"></span>
                </h5>
              </div>
            </div>
          </div>
        </a>
      @endforeach
      @endif
      </div>
    </div>
  </div>
  <div class="col-lg-8">
    <div class="card card-plain" >

      <!-- group card -->
      <div class="card-header d-inline-block">
        <div class="row">
          <div class="col-md-9">
            <div class="media align-items-center">
              <i class="ni ni-single-02 avatar mr-2"></i>
              <div class="media-body">
                @if($show_chat)
                <h4 class="mb-0 d-block">
                  {{-- {{dd($show_chat->pendonor->pengguna->mendonor->first()->id)}}
                  {{dd($show_chat->penerima->pengguna->menerimaDonor->first()->id)}} --}}
                  {{ $show_chat->admin->name }},
                  {{ $show_chat->pendonor->name }},
                  {{ $show_chat->penerima->name }}
                </h4>
                <small class="text-muted text-small">last seen message at {{ $show_chat->updated_at }}</small>
                @endif
              </div>
            </div>
          </div>
          @if (Auth::user()->role == 'admin')
          <div class="col-md-3">
            <div class="btn btn-success"><a href="#" data-toggle="modal" data-target="#jadwalModal">
              Atur Jadwal
          </a></div>
          </div>
          {{-- MODAL ATUR JADWAL --}}
          <div class="modal fade" id="jadwalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Atur Jadwal Pendonoran ID #</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <form action="/admin/setjadwal" method="post">
                        @method('post')
                        @csrf
                        <div class="row modal-body">
                          <div class="col">
                            @if($show_chat 
                                && $show_chat->pendonor->pengguna->mendonor
                                && $show_chat->pendonor->pengguna->mendonor->first())
                              <input type="hidden" name="id_d_pendonor" id="" value="{{$show_chat->pendonor->pengguna->mendonor->first()->id}}">
                              <input type="hidden" name="id_d_penerima" id="" value="{{$show_chat->penerima->pengguna->menerimaDonor->first()->id}}">
                              <input type="hidden" name="pendonorId" id="" value="{{$show_chat->pendonor->pengguna->id}}">
                              <input type="hidden" name="penerimaId" id="" value="{{$show_chat->penerima->pengguna->id}}">

                              <div class="row form-group">
                                <label class="col-form-label col-6" for="id_udd">UDD</label>
                                <div class="col-6">
                                  <select class="form-control" id="id_udd" name="id_udd">
                                    @if($udds)
                                      @foreach ($udds as $udd)
                                      <option value="{{$udd->id}}">{{$udd->id}}:{{$udd->nama_unit}}</option>
                                      @endforeach
                                    @endif
                                  </select>
                                </div>
                              </div>


                              <!-- chat handler -->
                              <input type="hidden" name="id_partisipan" value="{{ $show_chat->id }}">
                              <input type="hidden" name="id_pengirim" value="{{ Auth::user()->id }}">
                            @endif
                            <div class="form-group row mb-3">
                              <label for="tgl" class="col-6 col-form-label">Tanggal Donor</label>
                              <div class="col-6">
                                <input class="form-control" type="date" placeholder="Tanggal Donor" id="tgl" name="tgl" value="11-11-11">
                    
                                <!-- Error -->
                                @if ($errors->has('tanggal_swab'))
                                <div class="error text-danger" style="font-size: 12px;">
                                    {{ $errors->first('tanggal_swab') }}
                                </div>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="row">
                            <div class="col">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Simpan</button>
                            </div>
                          </div>
                      </div>
                      </form>
                </div>
            </div>
        </div>
          @endif
        </div>
      </div>

      <!-- chat card -->
      <div class="card-body overflow-scroll" style="max-height: 768px; overflow-y: scroll;">
        @if(Session::has('success'))
        <div class="alert alert-success">
          {{Session::get('success')}}
        </div>
        @endif
        @if($show_chat)
        @foreach ($show_chat->pesan as $pesan)
        <div class="row {{ $pesan->id_pengirim == Auth::user()->id ? 'justify-content-end text-right' : 'justify-content-start' }}">
          <div class="col-auto">
            <div class="card {{ $pesan->id_pengirim == Auth::user()->id ? 'bg-gradient-primary text-white' : '' }}">
              <div class="card-body p-2">
                <p class="mb-1"> {{ $pesan->isi }} </p>
                <div>
                  <small class="opacity-60" style="display: flex; {{ $pesan->id_pengirim == Auth::user()->id ? 'flex-direction: row-reverse;' : '' }}">
                    <i class="ni ni-check-bold px-1"></i> {{ $pesan->created_at }} {{ $pesan->pengirim->name }}
                  </small>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
          <h3>
            ups... grup chat anda masih kosong
          </h3>
        @endif
      </div>
      <div class="card-footer d-block">
        @if($show_chat)
        <form class="form-group" action="{{ route('chat-store') }}" method="POST">
          @csrf
          <div class="form-group input-group">
            <!----><!----><!---->
            <input type="hidden" name="id_partisipan" value="{{ $show_chat->id }}">
            <input type="hidden" name="id_pengirim" value="{{ Auth::user()->id }}">
            <input aria-describedby="addon-right addon-left" placeholder="Ketik Pesan" class="form-control" name="isi">
            <div class="input-group-append">
              <button type="submit" class="input-group-text">
                <i class="ni ni-send"></i>
              </button>
            </div>
            <!---->
          </div>
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection