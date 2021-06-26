<?php

namespace App\Admin\Controllers;

use App\Controller\BaseController;
use Illuminate\Http\Request;
use App\Common\Models\Pengguna;
use App\Common\Models\User;

class DasborController extends BaseController
{
    public function showPendonor() {
        $users = User::all();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }

    public function showPenerima() {
        $users = User::all();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }
}
