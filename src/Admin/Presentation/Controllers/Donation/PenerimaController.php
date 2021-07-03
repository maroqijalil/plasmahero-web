<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\UseCases\GetPenerima;
use App\Admin\UseCases\GetUserPengguna;
use App\Admin\UseCases\UpdatePengguna;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Repositories\PenggunaRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Exception;

class PenerimaController extends BaseController
{

	public function index()
	{
		$repository = App::make(UserRepositoryInterface::class);
		$users = new GetPenerima($repository);
		return view('admin.donor.recipient.index', [
			'users' => $users->execute()
		]);
	}

	public function show($id)
	{
		$repository = App::make(UserRepositoryInterface::class);
		$user = new GetUserPengguna($repository);
		return view('admin.donor.recipient.show', [
			'user' => $user->execute('id', $id)
		]);
	}

	public function update(Request $request, $id)
	{
		$repository = App::make(PenggunaRepositoryInterface::class);
		$pengguna = new UpdatePengguna($repository);
		
		try {
			$result = $pengguna->execute($request->except(['_method', '_token']), $id);

			if ($result) {
				return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui');
			} else {
				return redirect()->back()->with('error', 'Data pengguna gagal diperbarui');
			}
		} catch (Exception $e) {
			return redirect()->back()->with('error', $e->getMessage());
		}
	}
}
