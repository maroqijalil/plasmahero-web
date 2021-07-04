<?php

namespace App\Common\Controllers;

use App\Controller\BaseController;
use App\Common\Requests\UpdateProfileRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends BaseController
{
	public function index(Request $request)
	{
		$userData = Auth::user();
		$donorall = Auth::user()->pengguna->mendonor->where('tanggal', '<', Carbon::now()->format('Y-m-d'))->where('d_penerima', '<>', null);
    $pengguna = Auth::user()->pengguna;
    $isDataDiriComplete = $pengguna->no_hp && $pengguna->alamat && $pengguna->kelurahan && $pengguna->kecamatan && $pengguna->kota;
    $isDataDonorComplete = $pengguna->usia && $pengguna->jenis_kelamin && $pengguna->gol_darah && $pengguna->rhesus && $pengguna->berat_badan && $pengguna->tanggal_swab;
    $isAllComplete = $isDataDiriComplete && $isDataDiriComplete && $pengguna->nama_tipe;
		return view('user.others.profile', compact(['userData', 'donorall', 'isDataDiriComplete', 'isDataDonorComplete', 'isAllComplete']));
	}

	public function update(UpdateProfileRequest $request)
	{
		Auth::user()->update($request->only('name'));

		if ($request->input('password')) {
			Auth::user()->update([
				'password' => bcrypt($request->input('password'))
			]);
		}

		return back()->with('success', 'Profile diperbarui');
	}
}
