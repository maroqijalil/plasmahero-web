<?php

namespace App\Admin\UseCases;

use App\Common\Repositories\UserRepository;

class GetPendonor
{
  private $repository;

  public function __construct(UserRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute()
  {
    $pendonors = $this->repository->getByType("pendonor");
    return $pendonors;
  }
}
