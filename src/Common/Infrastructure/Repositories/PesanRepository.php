<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Models\Pesan;

class PesanRepository extends BaseRepository implements PesanRepositoryInterface
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
  public function __construct(Pesan $model)
  {
    $this->model = $model;
  }
}
