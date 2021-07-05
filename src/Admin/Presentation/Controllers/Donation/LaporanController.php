<?php

namespace App\Admin\Controllers\Donation;

use App\Controller\BaseController;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use App\Common\Models\Donor;
use Illuminate\Support\Facades\DB;

class LaporanController extends BaseController
{
	public function getLaporanStatus()
	{
		$all = Pengguna::with(['user', 'report', 'menerimaDonor', 'mendonor'])
            ->get()
            ->reject(function($data) {
                return $data->status == 'i';
            });
		$waitingToMatch = DB::table('pengguna')->where('status', ['s', 'g'])->get();
		$waitingToSchedule = DB::table('pengguna')->where('status', 'm')->get();
		$planned = DB::table('pengguna')->where('status', 'p')->get();
		$done = DB::table('pengguna')->where('status', 'a')->get();

		return view('admin.donor.laporan-status', compact(['all', 'waitingToMatch', 'waitingToSchedule', 'planned', 'done']));
	}

	public function getLaporanTanggal()
	{
		$all = Donor::with(['penerima', 'pendonor'])
			->get()
			->reject(function ($data) {
			    if ($data->penerima == null)
			        return false;
			    return $data->penerima->status != 'p';;
			});

		$allData = [];
		$userPendonor = [];
		$userPenerima = [];
		foreach ($all as $laporan) {
		    if($laporan->pendonor != null)
		        continue;
		    if($laporan->penerima != null)
		        continue;

		    array_push($allData, $laporan);
            array_push($userPendonor, User::findOrFail($laporan->pendonor->id_user));
            array_push($userPenerima, User::findOrFail($laporan->penerima->id_user));
		}

		return view('admin.donor.laporan-tanggal', compact(['allData', 'userPendonor', 'userPenerima']));
	}
}
