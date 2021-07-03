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
		$userRepository = App::make(UserRepositoryInterface::class);
		$getPendonor = new GetPendonor($userRepository);
		return view('admin.donor.giver.index', [
			'users' => $getPendonor->execute()
		]);
	}

	public function show()
	{
		
	}
}
