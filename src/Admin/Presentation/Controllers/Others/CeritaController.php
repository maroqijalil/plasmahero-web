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
        $this->dbUpdate($id, 0);
        return back()->with('success', 'Status cerita berhasil direset');
    }

    public function accept($id)
    {
        $this->dbUpdate($id, 1);
        return back()->with('success', 'Cerita berhasil disetujui dan akan ditampilkan pada website pengguna');
    }

    public function reject($id)
    {
        $this->dbUpdate($id, 2);
        return back()->with('success', 'Cerita ditolak dan tidak akan ditampilkan pada website pengguna');
    }

    /*pindah ke repo*/
    public function dbUpdate($id, $status) {
        return DB::table('cerita')->where('id', $id)->update(['status' => $status]);
    }
}
