<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface PenggunaRepositoryInterface extends BaseRepositoryInterface {

  public function getByType($type): ?Collection;
}
