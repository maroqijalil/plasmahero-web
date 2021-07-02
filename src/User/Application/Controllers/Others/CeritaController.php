<?php

namespace App\User\Controllers\Others;

use Illuminate\Http\Request;
use App\Controller\BaseController;
use App\Common\Models\Cerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CeritaController extends BaseController
{
    public function index()
    {
//        $ceritas = Cerita::get();
//        return view('user.others.index', compact(['ceritas']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cerita' => 'required',
        ]);

        Cerita::create([
            'id_user' => Auth::user()->id,
            'cerita' => $request->cerita,
            'status' => 0,
        ]);

        return redirect('/')->with('success', 'Cerita berhasil ditambahkan. Menunggu admin untuk menyetujui untuk ditampilkan');
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
//        Galeri::findOrFail($id)->delete();
//        return back()->with('success', 'Dokumentasi berhasil dihapus');
    }
}
