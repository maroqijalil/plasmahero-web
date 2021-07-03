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
		$repository = App::make(UserRepositoryInterface::class);
		$users = new GetPenerima($repository);
		return view('admin.donor.recipient.index', [
			'users' => $users->execute()
		]);
	}

	public function show()
	{
		
	}
}
