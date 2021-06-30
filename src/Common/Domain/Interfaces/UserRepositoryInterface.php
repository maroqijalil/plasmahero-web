<?php

namespace App\Common\Interfaces;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface extends BaseRepositoryInterface {
  /**
   * Get user model by name.
   *
   * @return Collection
   */
  public function searchByName($name): ?Collection;
  
  /**
   * Update User Profile.
   * @param int $id_user
   * @param array $payload
   * @return Mixed
   */
  public function updateProfile($id_user, $payload): ?Array;

  /**
   * Delete User Profile.
   * @param int $id_user
   * @return bool
   */
  public function deleteProfile($id_user): ?bool;

  /**
   * Get User yang mempunyai tipe penerima.
   * @param null
   * @return Collection
   */
  public function getPenerima() : Collection;

  /**
   * Get User yang mempunyai tipe pendonor.
   * @param null
   * @return Collection
   */
  public function getPendonor() : Collection;
}
