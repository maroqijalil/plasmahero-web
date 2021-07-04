<?php

namespace App\Common\Controllers;

use App\Common\Models\Pengguna;
use App\Controller\BaseController;
use App\User\Requests\StoreReportRequest;
use App\Common\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Common\Repositories\ReportRepositoryInterface;
use Illuminate\Support\Facades\Redirect;

class ReportController extends BaseController
{
    protected $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index(Request $request)
    {
        if (Auth::user()->pengguna->status != 'a')
            return abort(403, "Anda tidak memiliki akses halaman ini");
        return view('user.donor.fill-report');
    }

    public function show(Request $request)
    {
        $reports = Report::all();
        return view('admin.donor.berita-acara', ['reports' => $reports]);
    }

    public function store(StoreReportRequest $request)
    {
        $image = $request->foto;
        $imageName = time() . '-' . Auth::user()->pengguna->id . '-' . $image->getClientOriginalName();
        $imageName = str_replace(' ', '-', strtolower($imageName));
        $image->storeAs('images', $imageName);
        $image->move(public_path() . '/img/reports', $imageName);

        //  Store data in database
        $data = [
            'judul' => $request->judul,
            'tgl' => $request->tgl,
            'pesan' => $request->pesan,
            'foto' => '/img/reports/' . $imageName,
            'id_pengguna' => Auth::user()->pengguna->id,
            'id_donor' => Auth::user()->pengguna->nama_tipe == 'pendonor' ? Auth::user()->pengguna->mendonor->last()->id : Auth::user()->pengguna->menerimaDonor->last()->id,
        ];

        Report::create($data);
        Auth::user()->pengguna->update([
            'status' => 'i',
            'nama_tipe' => null
        ]);

        return Redirect::route('profile')->with('report', 'Berita acara ditambahkan !');
    }

    public function fetch()
    {
        $report = $this->reportRepository->all();
        return $this->sendResponse($report, "Daftar report berhasil di dapatkan");
    }

    public function destroy($id)
    {
        $this->reportRepository->deleteById($id);
        return $this->sendResponse($id, "Report id {$id} berhasil di dihapus");
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->reportRepository->update($id, $data);

        return $this->sendResponse($data, "Report id {$id} berhasil di di update");
    }

    public function create(Request $request)
    {
        $data = [
            'judul' => $request->judul,
            'tgl' => $request->tgl,
            'pesan' => $request->pesan,
            'foto' => $request->foto,
            'id_user' => Auth::user()->id
        ];

        $this->reportRepository->create($data);
        return $this->sendResponse($data, "Report berhasil di ditambahkan");
    }
}
