<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreReportRequest;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
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
        $judul = $request->judul;
        $tgl = $request->tgl;
        $pesan = $request->pesan;
        $foto = $request->foto;
        $id_user = Auth::user()->id;

        Report::create([
            'judul' => $judul,
            'tgl' => $tgl,
            'pesan' => $pesan,
            'foto' => $foto,
            'id_user' => $id_user
        ]);

        return back()->with('success', 'Berita acara ditambahkan !');
    }
}
