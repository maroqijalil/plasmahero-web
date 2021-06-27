<?php

namespace App\Common\Controllers;

use App\Controller\BaseController;
use App\User\Requests\StoreReportRequest;
use App\Common\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Common\Interfaces\ReportRepositoryInterface;

class ReportController extends BaseController
{
    protected $reportRepository;

    public function __construct(ReportRepositoryInterface $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    public function index(Request $request)
    {
        return view('layouts.user.donor.fill-report');
    }

    public function show(Request $request)
    {
        $reports = Report::all();
        return view('layouts.admin.donor.berita-acara', ['reports' => $reports]);
    }

    public function store(StoreReportRequest $request)
    {
        //  Store data in database
        $data = [
            'judul' => $request->judul,
            'tgl' => $request->tgl,
            'pesan' => $request->pesan,
            'foto' => $request->foto,
            'id_user' => Auth::user()->id
        ];

        Report::create($data);

        return back()->with('success', 'Berita acara ditambahkan !');
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
