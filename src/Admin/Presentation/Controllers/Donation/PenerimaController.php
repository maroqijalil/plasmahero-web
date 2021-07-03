<?php

namespace App\Admin\Controllers\Donation;

use App\Admin\UseCases\GetPenerima;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Support\Facades\App;

class PenerimaController extends BaseController
{

	public function index()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$getPenerima = new GetPenerima($userRepository);
		return view('admin.donor.recipient.index', [
			'users' => $getPenerima->execute()
		]);
	}

	public function show()
	{
		
	}
}
