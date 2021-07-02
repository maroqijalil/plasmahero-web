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
            <i class="ni ni-single-02 avatar"></i>
              <div class="media-body">
                @if($show_chat)
                <h4 class="mb-0 d-block">
                  {{ $show_chat->admin->name }},
                  {{ $show_chat->pendonor->name }},
                  {{ $show_chat->penerima->name }}
                </h4>
                <small class="text-muted text-small">last seen message at {{ $show_chat->updated_at }}</small>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- chat card -->
      <div class="card-body overflow-scroll" style="max-height: 768px; overflow-y: scroll;">
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