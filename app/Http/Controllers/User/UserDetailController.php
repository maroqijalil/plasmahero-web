<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserDetailRequest;
use App\Models\Pengguna;
use App\Models\User;

class UserDetailController extends Controller
{
    public function index () {
        return view('layouts.user.donor.fill-user-detail');
    }

    public function store (StoreUserDetailRequest $request) {
        Pengguna::create([
            'user_id' => $request->id_user,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'nama_tipe' => $request->nama_tipe,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gol_darah' => $request->gol_darah,
            'rhesus' => $request->rhesus,
            'berat_badan' => $request->berat_badan,
            'tanggal_swab' => $request->tanggal_swab,
        ]);
        
        return back()->with('success', 'Detail data berhasil diisi!');
    }

    public function show() {
        $users = User::get();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }
}