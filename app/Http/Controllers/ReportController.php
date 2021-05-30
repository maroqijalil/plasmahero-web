<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReport;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('berita-acara');
    }

    public function show(Request $request)
    {
        $reports = Report::all();
        return view('admin.report', ['reports' => $reports]);
    }

    public function store(StoreReport $request)
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
