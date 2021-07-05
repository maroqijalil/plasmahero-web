<?php

namespace App\User\Controllers;

use App\Controller\BaseController;
use App\User\Requests\StoreUserDetailRequest;
use Illuminate\Http\Request;
use App\Common\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class UserDetailController extends BaseController
{
	public function create()
	{
		return view('user.donor.user-detail', ['pengguna' => Auth::user()->pengguna]);
	}

	public function store(Request $request)
	{
		try {
			Auth::user()->pengguna->update($request->except(['_method', '_token']));
			
			return back()->with('success', 'Detail data berhasil disimpan!');
		} catch (Exception $e) {
			return back()->with('error', $e->getMessage());
		}
	}

	public function update(Request $request)
	{
		Auth::user()->pengguna->update($request->except(['_method', '_token']));

		return back()->with('success', 'Detail data berhasil diisi!');
	}

	public function show()
	{
		$users = User::get();
		return view('admin.donor.donor-giver', ['users' => $users]);
	}
}
