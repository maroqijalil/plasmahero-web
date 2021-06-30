<?php

namespace App\Admin\Repositories;

use App\Common\Models\Pencocokan;
use App\Repository\BaseRepository;

class PendonoranRepository extends BaseRepository implements PendonoranRepositoryInterface
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
  public function __construct(Pencocokan $model)
  {
    $this->model = $model;
  }
}
