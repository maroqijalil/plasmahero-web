<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\UserRepositoryInterface;
use App\Common\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
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
  public function __construct(User $model)
  {
    $this->model = $model;
  }
}
