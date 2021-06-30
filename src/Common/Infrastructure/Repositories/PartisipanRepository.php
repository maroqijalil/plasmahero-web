<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Models\Partisipan;

class PartisipanRepository extends BaseRepository implements PartisipanRepositoryInterface
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
  public function __construct(Partisipan $model)
  {
    $this->model = $model;
  }
}
