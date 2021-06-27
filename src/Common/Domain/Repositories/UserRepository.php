<?php

namespace App\Common\Repositories;

use App\Repository\BaseRepository;
use App\Common\Interfaces\UserRepositoryInterface;
use App\Common\Models\Donor;
use App\Common\Models\Menerima;
use App\Common\Models\Notifikasi;
use App\Common\Models\Partisipan;
use App\Common\Models\Pencocokan;
use App\Common\Models\Pengguna;
use App\Common\Models\User;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Mixed_;

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

  public function searchByName($name): Collection
  {
    return $this->model->where('name', 'like', '%'.$name.'%')->get();
  }

  public function updateProfile($id_user, $payload): Array
  {
    $user = $this->findById($id_user);
    if ($user->admin) {
      $old = $user->admin;
      $result['old'] = $old->replicate();;
      $user->admin->update($payload);
      $new = $user->admin;
      $result['new'] = $new;
      return  $result;
    }
    if ($user->pengguna) {
      $old = $user->pengguna;
      $result['old'] = $old->replicate();;
      $user->pengguna->update($payload);
      $new = $user->pengguna;
      $result['new'] = $new;
      return  $result;
    }
    $result = ['nothing changed'];
    return $result;
  }

  public function deleteProfile($id_user): bool
  {
    $user = $this->findById($id_user);
    if ($user->admin) {
      Partisipan::where('id_admin', '=', $user->admin->id)->update(['id_admin' => null]);
      Pencocokan::where('id_admin', '=', $user->admin->id)->update(['id_admin' => null]);
      Pengguna::where('id_admin', '=', $user->admin->id)->update(['id_admin' => null]);
      Notifikasi::where('id_admin', '=', $user->admin->id)->update(['id_admin' => null]);
      $user->admin->delete();
      return 1;
    }
    if ($user->pengguna) {
      Partisipan::where('id_pengguna', '=', $user->pengguna->id)->update(['id_pengguna' => null]);
      Pencocokan::where('id_pendonor', '=', $user->pengguna->id)->update(['id_pendonor' => null]);
      Pencocokan::where('id_penerima', '=', $user->pengguna->id)->update(['id_penerima' => null]);
      Menerima::where('id_pengguna', '=', $user->pengguna->id)->update(['id_pengguna' => null]);
      Notifikasi::where('id_admin', '=', $user->pengguna->id)->update(['id_admin' => null]);
      Donor::where('id_pendonor', '=', $user->pengguna->id)->update(['id_pendonor' => null]);
      Donor::where('id_penerima', '=', $user->pengguna->id)->update(['id_penerima' => null]);
      $user->pengguna->delete();
      return 1;
    }
    return 0;
  }
}
