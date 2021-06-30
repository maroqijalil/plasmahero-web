<?php
namespace App\Admin\Controllers\API;

use App\Admin\Repositories\PendonoranRepositoryInterface;
use App\Common\Repositories\UserRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Http\Request;

class PendonoranController extends BaseController {

  protected $pendonoranRepository;
  protected $userRepository;

  public function __construct(
    PendonoranRepositoryInterface $pendonoranRepository,
    UserRepositoryInterface $userRepository
    )
  {
      $this->pendonoranRepository = $pendonoranRepository;
      $this->userRepository = $userRepository;
  }

  public function show() {
    $pendonoran = $this->pendonoranRepository->all();
    return $this->sendResponse($pendonoran, 'success mengambil data pendonoran');
  }

  public function index () {
    $users_by_type['penerima'] = $this->userRepository->getPenerima();
    $users_by_type['pendonor'] = $this->userRepository->getPendonor();
    return $this->sendResponse($users_by_type, 'success mengambil data pengguna');
  }

  public function store(Request $request) {
    $pendonoran = $this->pendonoranRepository->create($request->all());
    return  $this->sendResponse($pendonoran, 'success menambahkan pencocokan donor');
  }

  public function update(Request $request, $id) {
    $pendonoran = $this->pendonoranRepository->update($id, $request->all());
    return  $this->sendResponse($pendonoran, 'success mengupdate pencocokan donor');
  }

  public function destroy($id) {
    $this->pendonoranRepository->deleteById($id);
    return $this->sendResponse(null, 'success menghapus data');
  }
}