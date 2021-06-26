<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\AdminRepositoryInterface;
use App\Common\Models\Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
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
  public function __construct(Admin $model)
  {
    $this->model = $model;
  }
}
