<?php

namespace App\Admin\Controllers;

use App\Admin\UseCases\GetPendonor;
use App\Admin\UseCases\GetPenerima;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use App\Common\Models\Pencocokan;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DasborController extends BaseController
{
	public function index()
	{
		$userRepository = App::make(UserRepositoryInterface::class);
		$getPenerima = new GetPenerima($userRepository);
		$penerima = $getPenerima->execute()->count();
		
		$getPendonor = new GetPendonor($userRepository);
		$pendonor = $getPendonor->execute()->count();

		$new_users = $this->getNewUserCount();
		$new_pencocokan = $this->getNewPencocokanCount();
		$my_labels = $this->getSevenDates('m/d');
		$pencocokan = Pencocokan::all()->count();
		$udd = \DB::table('donor')->distinct()->get(['nama_udd'])->count();
		return view('admin.dashboard', compact(['new_users', 'new_pencocokan', 'my_labels', 'pendonor', 'penerima', 'pencocokan', 'udd']));
	}

	/* get 7 last days */
	public function getSevenDates($format)
	{
		$today_subs = [
			Carbon::now()->format($format),
			Carbon::now()->subDays(1)->format($format),
			Carbon::now()->subDays(2)->format($format),
			Carbon::now()->subDays(3)->format($format),
			Carbon::now()->subDays(4)->format($format),
			Carbon::now()->subDays(5)->format($format),
			Carbon::now()->subDays(6)->format($format)
		];
		return $today_subs;
	}

	/* get new user 7 last days */
	public function getNewUserCount()
	{
		$users = User::where('created_at', '>', Carbon::now()->subDays(6))->get();
		$tomorrow = Carbon::tomorrow()->format('Y-m-d');
		$today_subs = $this->getSevenDates('Y-m-d');
		$new_users_count = [
			$users->whereBetween('created_at', [$today_subs[0], $tomorrow])->count(),
			$users->whereBetween('created_at', [$today_subs[1], $today_subs[0]])->count(),
			$users->whereBetween('created_at', [$today_subs[2], $today_subs[1]])->count(),
			$users->whereBetween('created_at', [$today_subs[3], $today_subs[2]])->count(),
			$users->whereBetween('created_at', [$today_subs[4], $today_subs[3]])->count(),
			$users->whereBetween('created_at', [$today_subs[5], $today_subs[4]])->count(),
			$users->whereBetween('created_at', [$today_subs[6], $today_subs[5]])->count()
		];
		return $new_users_count;
	}

	/* get new pencocokan 7 last days */
	public function getNewPencocokanCount()
	{
		$pencocokan = Pencocokan::where('created_at', '>', Carbon::now()->subDays(6))->get();
		$tomorrow = Carbon::tomorrow()->format('Y-m-d');
		$today_subs = $this->getSevenDates('Y-m-d');
		$new_pencocokan_count = [
			$pencocokan->whereBetween('created_at', [$today_subs[0], $tomorrow])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[1], $today_subs[0]])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[2], $today_subs[1]])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[3], $today_subs[2]])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[4], $today_subs[3]])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[5], $today_subs[4]])->count(),
			$pencocokan->whereBetween('created_at', [$today_subs[6], $today_subs[5]])->count()
		];
		return $new_pencocokan_count;
	}
}
