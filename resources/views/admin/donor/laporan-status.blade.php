@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <nav class="mb-2" aria-label="breadcumb" style="font-size: 14px;">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Donor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Penerima</li>
        </ol>
    </nav>
    <h3 class="font-weight-bold">Data Penerima</h3>
@stop

@section('card-stats')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Menunggu di cocokkan</h5>
                            <span class="h2 font-weight-bold mb-0">{{count($waitingToMatch)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni-active-40"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Sedang mengatur jadwal</h5>
                            <span class="h2 font-weight-bold mb-0">{{count($waitingToSchedule)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-chart-pie-35"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Menunggu waktu pendonoran</h5>
                            <span class="h2 font-weight-bold mb-0">{{count($matched)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Pendonoran selesai</h5>
                            <span class="h2 font-weight-bold mb-0">{{count($done)}}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-chart-bar-32"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="my-auto">Laporan Status Donor</h3>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="judul">Nama</th>
                            <th scope="col" class="sort" data-sort="judul">Peran</th>
                            <th scope="col" class="sort" data-sort="deskripsi">Status</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">

                        @foreach ($all as $laporan)
                            <tr>
                                <td class="name">
                                    <p>{{$laporan->user->name}}</p>
                                </td>
                                <td class="role">
                                    <p>{{$laporan->nama_tipe}}</p>
                                </td>
                                <td class="status">
                                    @if($laporan->status == 's' or $laporan->status == 's')
                                        <p class="text-warning font-weight-bold">Menunggu dicocokkan</p>
                                    @elseif($laporan->status == 'g')
                                        <p class="text-warning font-weight-bold">Sedang mengatur jadwal</p>
                                    @elseif($laporan->status == 'p')
                                        <p class="text-warning font-weight-bold">Menunggu waktu pendonoran</p>
                                    @else
                                        <p class="text-warning font-weight-bold">Pendonoran selesai</p>
                                    @endif
                                </td>
                                <td class="lihat-detail">
                                    @if($laporan->status == 's' or $laporan->status == 's')
                                        <button class="btn btn-primary">Lakukan pencocokan</button>
                                    @elseif($laporan->status == 'g')
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#waitingForSchedule{{$laporan->id}}">Jadwalkan melalui chat</button>
                                    @elseif($laporan->status == 'p')
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#matched{{$laporan->id}}">Lihat Jadwal</button>
                                    @else
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#done{{$laporan->id}}">Lihat Berita Acara</button>
                                    @endif
                                </td>
                            </tr>
                            <!-- Untuk menunggu dicocokkan -->
                            <div class="modal fade" id="matched{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Informasi pendonoran Sdr. {{$laporan->user->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group row mb-3">
                                                            <label for="tipe" class="col-3 col-form-label">Peran</label>
                                                            <div class="col-7">
                                                                <input disabled="true" class="form-control" type="text" id="no_hp" name="no_hp" value="{{ $laporan->nama_tipe }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="alamat" class="col-3 col-form-label">Alamat</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="alamat" name="alamat" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->alamat ?? $laporan->mendonor[count($laporan->mendonor)-1]->alamat}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kelurahan" name="kelurahan" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kelurahan ?? $laporan->mendonor[count($laporan->mendonor)-1]->kelurahan }}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kecamatan ?? $laporan->mendonor[count($laporan->mendonor)-1]->kecamatan }}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kota" class="col-3 col-form-label">Kota</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kota" name="kota" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kota ?? $laporan->mendonor[count($laporan->mendonor)-1]->kota }}">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End untuk menunggu dicocokkan -->

                            <!-- Untuk pendonoran selesai -->
                            <div class="modal fade" id="done{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Berita Acara Pendonoran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group row mb-3">
                                                            <label for="judul" class="col-3 col-form-label">Judul</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->report) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="judul" name="judul" value="{{ $laporan->report[count($laporan->report)-1]->pesan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="tanggal" class="col-3 col-form-label">Tanggal</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->report) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="tanggal" name="tanggal" value="{{ $laporan->report[count($laporan->report)-1]->tgl}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="pesan" class="col-3 col-form-label">Pesan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->report) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="pesan" name="pesan" value="{{ $laporan->report[count($laporan->report)-1]->pesan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="foto" class="col-3 col-form-label">Foto</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->report) > 0)
                                                                    <img src="{{url( $laporan->report[count($laporan->report)-1]->foto)}}" alt="" class="rounded img-fluid w-auto">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End untuk pendonoran selesai -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
