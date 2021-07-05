<?php

namespace App\Common\Controllers\API;

use App\Controller\BaseController;
use App\Common\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function index() {
        $user = $this->userRepository->findById(Auth::user()->id);
        if ($user->pengguna) {
            $message = 'profil pengguna';
            return $this->sendResponse($user, $message);
        }
        if ($user->admin) {
            $message = 'profil admin';
            return $this->sendResponse($user, $message);
        }
        return $this->sendError($user);
    }

    public function updateUser (Request $request)
    {
        $user_account = $this->userRepository->update(Auth::user()->id, $request->all());
        return $this->sendResponse($user_account, 'Berhasil Merubah');
    }

    public function updateDetail (Request $request)
    {
        $user_account = $this->userRepository->updateProfile(Auth::user()->id, $request->all());
        return $this->sendResponse($user_account, 'Berhasil Merubah');
    }

    public function destroy() {
        $this->userRepository->deleteProfile(Auth::user()->id);
        $user = $this->userRepository->deleteById(Auth::user()->id);
        return $this->sendResponse($user, 'Berhasil Delete');
    }
}
