<?php

namespace App\Admin\Controllers;

use App\Controller\Controller;
use App\Common\Models\User;
use App\Common\Models\Pencocokan;
use App\Admin\Requests\StorePendonoranRequest;
use Illuminate\Support\Facades\Auth;

class PendonoranController extends Controller
{
    public function index() {
        if (Auth::user()->admin == null) return redirect()->route('show-admin-akun');
        $users = User::all();
        $pencocokans = Pencocokan::all();
        return view('layouts.admin.donor.donation', ['users' => $users, 'pencocokans' => $pencocokans]);
    }

    public function store(StorePendonoranRequest $request) {
        Pencocokan::create([
            'id_admin' => $request->id_admin,
            'id_pendonor' => $request->id_pendonor,
            'id_penerima' => $request->id_penerima
        ]);

        return back()->with('success', 'Pencocokan Berhasil ditambahkan');
    }
}