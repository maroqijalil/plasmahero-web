<?php

namespace App\Admin\Controllers;

use App\Controller\BaseController;
use App\Common\Models\Pengguna;
use Illuminate\Support\Facades\DB;

class LaporanController extends BaseController
{
    public function index() {
        $all = Pengguna::with(['user', 'report', 'menerimaDonor', 'mendonor'])->get();
//        dd($all);
        $waitingToMatch = DB::table('pengguna')->where('status', ['s','g'])->get();
        $waitingToSchedule = DB::table('pengguna')->where('status', 'm')->get();
        $matched = DB::table('pengguna')->where('status', 'p')->get();
        $done = DB::table('pengguna')->where('status', 'a')->get();

        return view('admin.donor.laporan', compact(['all', 'waitingToMatch', 'waitingToSchedule', 'matched', 'done']));
    }
}
