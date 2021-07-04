<?php

namespace App\Admin\UseCases;

use App\Common\Repositories\UserRepository;

class GetUserPengguna
{
  private $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($attr = '', $val = '')
  {
    if ($attr == 'id') {
      return $this->repository->findById($val, ['*'], ['pengguna']);
    } else {
      return $this->repository->all(['*'], ['pengguna']);
    }
  }
}
