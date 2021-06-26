<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\PencocokanRepositoryInterface;
use App\Common\Models\Pencocokan;

class PencocokanRepository extends BaseRepository implements PencocokanRepositoryInterface
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
