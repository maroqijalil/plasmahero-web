<?php

namespace App\Admin\UseCases;

use App\Common\Repositories\PenggunaRepository;

class UpdatePengguna
{
  private $repository;

  public function __construct(PenggunaRepository $repository)
  {
    $this->repository = $repository;
  }

  public function execute($request, $id)
  {
    return $this->repository->update($id, $request);
  }
}
