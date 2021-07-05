<?php

namespace App\Admin\Controllers\Donation;

use App\Controller\BaseController;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use App\Common\Models\Donor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
		$all_penerima = $this->getLaporanByRole('penerima');
		$all_pendonor = $this->getLaporanByRole('pendonor');

		$all = new Collection();
		$all = $all->union($all_pendonor);
		$all = $all->union($all_penerima);
		$allData = $all;

		// dd($allData);

		return view('admin.donor.laporan-tanggal', compact(['allData']));
	}

	/* pindah ke repo */
	public function getLaporanByRole($role) {
		return Donor::whereHas($role, function (Builder $query) {
      $query->where('status', 'like', 'p');
    })->get();
	}
}
