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
                            <span class="h2 font-weight-bold mb-0">{{count($planned)}}</span>
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
                                    @if($laporan->status == 's' or $laporan->status == 'g')
                                        <p class="text-warning font-weight-bold">Menunggu dicocokkan</p>
                                    @elseif($laporan->status == 'm')
                                        <p class="text-warning font-weight-bold">Sedang mengatur jadwal</p>
                                    @elseif($laporan->status == 'p')
                                        <p class="text-warning font-weight-bold">Menunggu waktu pendonoran</p>
                                    @else
                                        <p class="text-warning font-weight-bold">Pendonoran selesai</p>
                                    @endif
                                </td>
                                <td class="lihat-detail">
                                    @if($laporan->status == 's' or $laporan->status == 'g')
                                        <a href="/admin/pendonoran" class="btn btn-primary">Lakukan pencocokan</a>
                                    @elseif($laporan->status == 'g')
                                        <a class="btn btn-primary">Lakukan pencocokan</a>
                                    @elseif($laporan->status == 'm')
                                        <a href="{{ route('chat', ['id' => 1]) }}" class="btn btn-primary">Jadwalkan lewat chat</a>
                                    @elseif($laporan->status == 'p' && $laporan->nama_tipe == 'pendonor')
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#plannedPendonor{{$laporan->id}}">Lihat Detail</button>
                                    @elseif($laporan->status == 'p' && $laporan->nama_tipe == 'penerima')
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#plannedPenerima{{$laporan->id}}">Lihat Detail</button>
                                    @endif
                                </td>
                            </tr>

                            <!-- Untuk melihat lihat detail pendonor -->
                            <div class="modal fade" id="plannedPendonor{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                            <label for="alamat" class="col-3 col-form-label">Jadwal</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->mendonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="alamat" name="alamat" value="{{ $laporan->mendonor[count($laporan->mendonor)-1]->tanggal}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="alamat" class="col-3 col-form-label">Alamat</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->mendonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="alamat" name="alamat" value="{{ $laporan->mendonor[count($laporan->mendonor)-1]->alamat}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->mendonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kelurahan" name="kelurahan" value="{{ $laporan->mendonor[count($laporan->mendonor)-1]->kelurahan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->mendonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{ $laporan->mendonor[count($laporan->mendonor)-1]->kecamatan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kota" class="col-3 col-form-label">Kota</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->mendonor) > 0)
                                                                <input disabled="true" class="form-control" type="text" id="kota" name="kota" value="{{ $laporan->mendonor[count($laporan->mendonor)-1]->kota}}">
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
                            <!-- End untuk melihat lihat detail pendonor-->

                            <!-- Untuk melihat lihat detail penerima -->
                            <div class="modal fade" id="plannedPenerima{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                                            <label for="alamat" class="col-3 col-form-label">Jadwal</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="alamat" name="alamat" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->tanggal}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="alamat" class="col-3 col-form-label">Alamat</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="alamat" name="alamat" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->alamat}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="kelurahan" name="kelurahan" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kelurahan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kecamatan" class="col-3 col-form-label">Kecamatan</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="kecamatan" name="kecamatan" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kecamatan}}">
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row mb-3">
                                                            <label for="kota" class="col-3 col-form-label">Kota</label>
                                                            <div class="col-7">
                                                                @if(count($laporan->menerimaDonor) > 0)
                                                                    <input disabled="true" class="form-control" type="text" id="kota" name="kota" value="{{ $laporan->menerimaDonor[count($laporan->menerimaDonor)-1]->kota}}">
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
                            <!-- End untuk melihat lihat detail penerima -->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
