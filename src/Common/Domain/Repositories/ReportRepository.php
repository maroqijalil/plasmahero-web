<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\ReportRepositoryInterface;
use App\Common\Models\Report;

class ReportRepository extends BaseRepository implements ReportRepositoryInterface
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
  public function __construct(Report $model)
  {
    $this->model = $model;
  }
}
