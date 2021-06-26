<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\DonorRepositoryInterface;
use App\Common\Models\Donor;

class DonorRepository extends BaseRepository implements DonorRepositoryInterface
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
  public function __construct(Donor $model)
  {
    $this->model = $model;
  }
}
