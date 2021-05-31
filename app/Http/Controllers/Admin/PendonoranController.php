<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pencocokan;
use App\Http\Requests\Admin\StorePendonoranRequest;
use Illuminate\Support\Facades\Auth;

class PendonoranController extends Controller
{
    public function index() {
        if (Auth::user()->admin == null) return view('layouts.admin.others.account');
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