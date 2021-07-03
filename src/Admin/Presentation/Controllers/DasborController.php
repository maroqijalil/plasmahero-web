<?php

namespace App\Admin\Controllers;

use App\Admin\UseCases\GetPendonor;
use App\Admin\UseCases\GetPenerima;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Support\Facades\App;

class DasborController extends BaseController
{
	public function showPendonor()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$getPendonor = new GetPendonor($userRepository);
	}

	public function showPenerima()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$getPenerima = new GetPenerima($userRepository);
	}
}
