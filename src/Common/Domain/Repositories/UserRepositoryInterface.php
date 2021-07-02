<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends BaseRepositoryInterface {

  public function getByEmail($email): ?Model;

  public function searchByName($name): ?Collection;
  
  public function updateProfile($id_user, $payload): ?Array;

  public function deleteProfile($id_user): ?bool;

  public function getPenerima() : Collection;

  public function getPendonor() : Collection;
}
