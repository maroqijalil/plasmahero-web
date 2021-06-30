<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Models\Pengguna;

class PenggunaRepository extends BaseRepository implements PenggunaRepositoryInterface
{
  /**
   * @var Model
   */
  protected $model;

  /**
   * BaseRepository constructor.
   *
   * @param Model $model
   */
  public function __construct(Pengguna $model)
  {
    $this->model = $model;
  }
}
