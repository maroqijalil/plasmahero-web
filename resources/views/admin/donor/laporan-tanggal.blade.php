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

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="my-auto">Laporan Tanggal</h3>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="judul">Pendonor</th>
                            <th scope="col" class="sort" data-sort="judul">Penerima Donor</th>
                            <th scope="col" class="sort" data-sort="judul">Tanggal Pendonoran</th>
                            <th scope="col" class="sort" data-sort="deskripsi">Tempat</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">

                        @foreach ($allData as $laporan)
                            <tr>
                                <td class="name">
                                    <p>{{$userPenerima[$loop->index]->name}}</p>
                                </td>
                                <td class="name">
                                    <p>{{$userPendonor[$loop->index]->name}}</p>
                                </td>
                                <td class="role">
                                    <p>{{$laporan->tanggal}}</p>
                                </td>
                                <td class="status">
                                    <p>{{"$laporan->alamat, $laporan->kelurahan"}}</p>
                                </td>
{{--                                <td class="lihat-detail">--}}
{{--                                    <button class="btn btn-primary" data-toggle="modal" data-target="#done{{$laporan->id}}">Lihat Berita Acara</button>--}}
{{--                                </td>--}}
                            </tr>
                            <div class="modal fade" id="done{{$laporan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Jadwal Pendonoran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
{{--                                                        <div class="form-group row mb-3">--}}
{{--                                                            <label for="tipe" class="col-3 col-form-label">Judul</label>--}}
{{--                                                            <div class="col-7">--}}
{{--                                                                <input disabled="true" class="form-control" type="text" id="no_hp" name="no_hp" value="{{ $laporan->judul }}">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

                                                        <div class="form-group row mb-3">
                                                            <label for="alamat" class="col-3 col-form-label">Tanggal</label>
                                                            <div class="col-7">
                                                                <input disabled="true" class="form-control" type="text" id="no_hp" name="no_hp" value="{{ $laporan->tanggal }}">
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
