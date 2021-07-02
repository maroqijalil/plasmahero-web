<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\StoreAccountRequest;
use App\Controller\BaseController;
use App\Common\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends BaseController
{
    public function index() {
        return view('admin.others.account');
    }

    public function store(StoreAccountRequest $request) {
        Admin::create([
            'id_user' => $request->id_user,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return back()->with('success', 'Profil Berhasil Ditambahkan');
    }
}
