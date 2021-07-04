@extends('user.layouts.app')

@section('title', 'Home')

@section('content')

@if(session()->has('error'))
    <div class="alert alert-success">
        {{ session()->get('error') }}
    </div>
@endif

<main id="main">
    <div class="container">
        <section id="gallery" class="gallery">
            <div class="container">
                <div class="section-title">
                    <h2>Galeri Kegiatan</h2>
                </div>
                <div class="row no-gutters">

                    @for ($i = 0; $i < 9  ; $i++)
                        <div class="col-lg-4 col-md-4 p-1">
                            <div class="hover gal rounded">
                                <img src="https://picsum.photos/300/200" alt="">
                                <div class="hover-overlay"></div>
                                <div class="gal-content gal-description px-5 py-4">
                                    <h3 class="gal-title text-uppercase font-weight-bold mb-0 text-shadow">
                                        Webinar Nasional 1.0
                                    </h3>
                                    <p class=" font-weight-light mb-0">
                                        <a href="" style="color: black !important;">
                                            Selengkapnya...
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Cerita covid</h2>
            </div>

            <div class="owl-carousel testimonials-carousel">
                @foreach($ceritas as $cerita)
                    <div class="testimonial-wrap">
                        <div class="testimonial-item">
                            <h3>{{$cerita->user->name}}</h3>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$cerita->cerita}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-cerita text-center mt-5">
                <a href="" class="btn btn-warning rounded-pill shadow font-weight-bold" data-toggle="modal" data-target="#tambahCeritaModal">
                    Tambahkan Cerita Anda Sendiri !
                    <i class="bx bxs-right-arrow-circle"></i>
                </a>
            </div>
            <div class="modal fade" id="tambahCeritaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambahkan cerita anda sendiri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="/cerita">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <textarea rows="5" class="form-control" type="text" id="cerita" name="cerita"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
