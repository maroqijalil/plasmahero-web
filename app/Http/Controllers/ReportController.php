<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReport;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        return view('layouts.user.donor.fill-report');
    }

    public function store(StoreReport $request)
    {
        //  Store data in database
        $judul = $request->judul;
        $tgl = $request->tgl;
        $pesan = $request->pesan;
        $foto = $request->foto;

        Report::create([
            'judul' => $judul,
            'tgl' => $tgl,
            'pesan' => $pesan,
            'foto' => $foto
        ]);

        return back()->with('success', 'Berita acara ditambahkan !');
    }
}
