<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Models\Pengguna;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class PenggunaRepository extends BaseRepository implements PenggunaRepositoryInterface
{
  protected $model;

  public function __construct(Pengguna $model)
  {
    $this->model = $model;
  }

  public function getByType($type): ?Collection
  {
    return $this->model->where('nama_tipe', 'like', $type)->get();
  }
}
