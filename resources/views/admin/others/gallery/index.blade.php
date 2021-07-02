@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
{{--                <div class="row">--}}
{{--                    --}}
{{--                </div>--}}
                <div class="card-header border-0">
                    <div class="container-fluid">
                        <div class="row">
                            <h3 class="my-auto">Dokumentasi kegiatan</h3>
                            <div class="ml-auto m-0">
                                <a href="/admin/galeri/tambah" class="btn btn-primary m-0">Tambah</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="judul">Judul</th>
                            <th scope="col" class="sort" data-sort="deskripsi">Deskripsi</th>
                            <th scope="col" class="sort" data-sort="foto">Foto</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach ($galleries as $galeri)
                            <tr>
                                <td class="name">
                                    <p>{{$galeri->judul}}</p>
                                </td>
                                <td class="title">
                                    <p>{{$galeri->deskripsi}}</p>
                                </td>
                                <td class="deskripsi">
                                    <img src="{{url($galeri->foto)}}" alt="" class="rounded img-fluid w-auto">
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow pl-5">
                                            <!-- Button trigger modal -->
                                            <a href="/admin/galeri/{{$galeri->id}}/edit" class="text-primary pr-2">
                                                Edit
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{$galeri->id}}" class="text-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$galeri->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Apakah anda yakin?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <form action="/admin/galeri/{{$galeri->id}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Ya, hapus data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
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
