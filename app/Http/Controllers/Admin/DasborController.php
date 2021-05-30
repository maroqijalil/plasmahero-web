<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\User;

class DasborController extends Controller
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
