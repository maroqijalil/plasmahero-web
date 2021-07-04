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
		// dd(Auth::user()->pengguna);
		$donorall = Auth::user()->pengguna->mendonor->where('tanggal', '<', Carbon::now()->format('Y-m-d'))->where('d_penerima', '<>', null);

		return view('user.others.profile', ['userData' => $userData, 'donorall' => $donorall]);
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
