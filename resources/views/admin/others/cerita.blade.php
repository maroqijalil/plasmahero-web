@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="my-auto">Cerita Tentang Covid</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col" class="sort" data-sort="judul">Nama</th>
                            <th scope="col" class="sort" data-sort="deskripsi">Cerita</th>
                            <th scope="col" class="sort" data-sort="deskripsi">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        @foreach ($ceritas as $cerita)
                            <tr>
                                <td class="name">
                                    <p>{{$cerita->user->name}}</p>
                                </td>
                                <td class="cerita">
                                    <p>{{$cerita->cerita}}</p>
                                </td>
                                <td class="status">
                                    @if($cerita->status == 0)
                                        <p class="text-primary">Belum Ditampilkan</p>
                                    @elseif($cerita->status == 1)
                                        <p class="text-success">Ditampilkan</p>
                                    @else
                                        <p class="text-danger">Ditolak</p>
                                    @endif
                                </td>
                                <td class="aksi">
                                    @if($cerita->status == 0)
                                        <div class="row">
                                            <button class="btn btn-primary" data-toggle="modal" data-target="#acceptModal{{$cerita->id}}">Terima</button>
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal{{$cerita->id}}">Tolak</button>
                                        </div>
                                    @else
                                        <a class="btn btn-primary" href="/admin/cerita/{{$cerita->id}}/reset">Reset status</a>
                                    @endif
                                </td>
                                <!-- Delete Modal -->
                                <div class="modal fade" id="acceptModal{{$cerita->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form action="/admin/cerita/{{$cerita->id}}/terima" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Ya, Tampilkan cerita</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="rejectModal{{$cerita->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <form action="/admin/cerita/{{$cerita->id}}/tolak" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Ya, tolak data</button>
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
