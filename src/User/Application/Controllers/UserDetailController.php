<?php

namespace App\User\Controllers;

use App\Controller\BaseController;
use App\User\Requests\StoreUserDetailRequest;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class UserDetailController extends BaseController
{
	public function create()
	{
		return view('user.donor.user-detail', ['pengguna' => Auth::user()->pengguna]);
	}

	public function store(StoreUserDetailRequest $request)
	{
		try {
			Auth::user()->pengguna->update($request->all());
			
			return back()->with('success', 'Detail data berhasil disimpan!');
		} catch (Exception $e) {
			return back()->with('error', $e->getMessage());
		}
	}

	public function update(StoreUserDetailRequest $request)
	{
		Auth::user()->pengguna->update([
			'id_user' => $request->id_user,
			'no_hp' => $request->no_hp,
			'alamat' => $request->alamat,
			'kelurahan' => $request->kelurahan,
			'kecamatan' => $request->kecamatan,
			'kota' => $request->kota,
			'usia' => $request->usia,
			'jenis_kelamin' => $request->jenis_kelamin,
			'gol_darah' => $request->gol_darah,
			'rhesus' => $request->rhesus,
			'berat_badan' => $request->berat_badan,
			'tanggal_swab' => $request->tanggal_swab,
		]);

		return back()->with('success', 'Detail data berhasil diisi!');
	}

	public function show()
	{
		$users = User::get();
		return view('admin.donor.donor-giver', ['users' => $users]);
	}
}
