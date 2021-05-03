<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function show()
    {
        $reports = \App\Models\Report::all();
        return view('show-reports', compact('reports'));
    }

    public function index(Request $request)
    {
        return view('berita-acara');
    }

    public function store(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'judul' => 'required',
            'tgl' => 'required',
            'pesan' => 'required',
            'foto' => 'required',
        ]);

        //  Store data in database
        Report::create($request->all());

        // 
        return back()->with('success', 'Berita acara ditambahkan !');
    }
}
