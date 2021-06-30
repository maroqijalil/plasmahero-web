<?php

namespace App\Common\Providers;

use App\Admin\Repositories\PendonoranRepositoryInterface;
use App\Admin\Repositories\PendonoranRepository;
use App\Repository\BaseRepository;
use App\Repository\BaseRepositoryInterface;
use App\Common\Repositories\AdminRepositoryInterface;
use App\Common\Repositories\DonorRepositoryInterface;
use App\Common\Repositories\GalleryRepositoryInterface;
use App\Common\Repositories\MenerimaRepositoryInterface;
use App\Common\Repositories\NotifikasiRepositoryInterface;
use App\Common\Repositories\PartisipanRepositoryInterface;
use App\Common\Repositories\PencocokanRepositoryInterface;
use App\Common\Repositories\PenggunaRepositoryInterface;
use App\Common\Repositories\PercakapanRepositoryInterface;
use App\Common\Repositories\PesanRepositoryInterface;
use App\Common\Repositories\ReportRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Common\Repositories\AdminRepository;
use App\Common\Repositories\DonorRepository;
use App\Common\Repositories\GalleryRepository;
use App\Common\Repositories\MenerimaRepository;
use App\Common\Repositories\NotifikasiRepository;
use App\Common\Repositories\PartisipanRepository;
use App\Common\Repositories\PencocokanRepository;
use App\Common\Repositories\PenggunaRepository;
use App\Common\Repositories\PercakapanRepository;
use App\Common\Repositories\PesanRepository;
use App\Common\Repositories\ReportRepository;
use App\Common\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
		$this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
		$this->app->bind(DonorRepositoryInterface::class, DonorRepository::class);
		$this->app->bind(GalleryRepositoryInterface::class, GalleryRepository::class);
		$this->app->bind(MenerimaRepositoryInterface::class, MenerimaRepository::class);
		$this->app->bind(NotifikasiRepositoryInterface::class, NotifikasiRepository::class);
		$this->app->bind(PartisipanRepositoryInterface::class, PartisipanRepository::class);
		$this->app->bind(PencocokanRepositoryInterface::class, PencocokanRepository::class);
		$this->app->bind(PenggunaRepositoryInterface::class, PenggunaRepository::class);
		$this->app->bind(PercakapanRepositoryInterface::class, PercakapanRepository::class);
		$this->app->bind(PesanRepositoryInterface::class, PesanRepository::class);
		$this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
		$this->app->bind(PendonoranRepositoryInterface::class, PendonoranRepository::class);
	}

	public function boot()
	{
	}
}
