<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\NotifikasiRepositoryInterface;
use App\Common\Models\Notifikasi;

class NotifikasiRepository extends BaseRepository implements NotifikasiRepositoryInterface
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
  public function __construct(Notifikasi $model)
  {
    $this->model = $model;
  }
}
