<?php

namespace App\Admin\Controllers\Others;

use Illuminate\Http\Request;
use App\Controller\BaseController;
use App\Common\Models\Cerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CeritaController extends BaseController
{
    public function index()
    {
        $ceritas = Cerita::with('user')->get();
        return view('admin.others.cerita', compact(['ceritas']));
    }

    public function reset($id)
    {
        DB::table('cerita')->where('id', $id)->update([
            'status' => 0
        ]);
        return back()->with('success', 'Status cerita berhasil direset');
    }

    public function accept($id)
    {
        DB::table('cerita')->where('id', $id)->update([
            'status' => 1
        ]);
        return back()->with('success', 'Cerita berhasil disetujui dan akan ditampilkan pada website pengguna');
    }

    public function reject($id)
    {
        DB::table('cerita')->where('id', $id)->update([
            'status' => 2
        ]);
        return back()->with('success', 'Cerita ditolak dan tidak akan ditampilkan pada website pengguna');
    }
}
