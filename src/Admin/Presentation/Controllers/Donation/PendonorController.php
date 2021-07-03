<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\UseCases\GetPendonor;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Support\Facades\App;

class PendonorController extends BaseController
{

	public function index()
	{
		$repository = App::make(UserRepositoryInterface::class);
		$users = new GetPendonor($repository);
		return view('admin.donor.giver.index', [
			'users' => $users->execute()
		]);
	}

	public function show()
	{
		
	}
}
