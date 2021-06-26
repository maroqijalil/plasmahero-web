<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\GalleryRepositoryInterface;
use App\Common\Models\Gallery;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
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
  public function __construct(Gallery $model)
  {
    $this->model = $model;
  }
}
