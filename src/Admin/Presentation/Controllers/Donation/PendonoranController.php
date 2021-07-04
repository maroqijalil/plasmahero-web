<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\Repositories\PendonoranRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\Pencocokan;
use App\Admin\Requests\StorePendonoranRequest;
use Illuminate\Support\Facades\App;

class PendonoranController extends BaseController
{

	public function index()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$pendonoranRepository = App::make(PendonoranRepositoryInterface::class);
		return view('admin.donor.donation', [
			'users' => $userRepository->all(),
			'pencocokans' => $pendonoranRepository->all()
		]);
	}

	public function store(StorePendonoranRequest $request)
	{
		Pencocokan::create([
			'id_admin' => $request->id_admin,
			'id_pendonor' => $request->id_pendonor,
			'id_penerima' => $request->id_penerima
		]);

		return back()->with('success', 'Pencocokan Berhasil ditambahkan');
	}

	public function fetch()
	{
		$pendonoranRepository = App::make(PendonoranRepositoryInterface::class);
		return $this->sendResponse($pendonoranRepository->all(), "Daftar pendonoran berhasil di dapatkan");
	}
}
