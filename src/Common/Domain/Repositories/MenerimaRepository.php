<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\MenerimaRepositoryInterface;
use App\Common\Models\Menerima;

class MenerimaRepository extends BaseRepository implements MenerimaRepositoryInterface
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
  public function __construct(Menerima $model)
  {
    $this->model = $model;
  }
}
