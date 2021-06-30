<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Models\Percakapan;

class PercakapanRepository extends BaseRepository implements PercakapanRepositoryInterface
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
  public function __construct(Percakapan $model)
  {
    $this->model = $model;
  }
}
