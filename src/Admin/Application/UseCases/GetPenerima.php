<?php

namespace App\Admin\UseCases;

use App\Common\Repositories\UserRepository;

class GetPenerima
{
  private $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute()
  {
    $pendonors = $this->repository->getPenggunaByType("penerima");
    return $pendonors;
  }
}
