<?php

namespace App\Admin\Controllers;

use App\Common\Interfaces\UserRepositoryInterface;
use App\Controller\BaseController;
use Illuminate\Http\Request;
use App\Common\Models\Pengguna;
use App\Common\Models\User;

class DasborController extends BaseController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function showPendonor() {
        $users = $this->userRepository->getPendonor();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }

    public function showPenerima() {
        $users = $this->userRepository->getPenerima();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }
}
