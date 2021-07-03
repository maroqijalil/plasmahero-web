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
        $admin = Auth::user()->admin;
        return view('admin.others.account', compact(['admin']));
    }

    public function store(StoreAccountRequest $request) {
        $admin = Admin::where('id_user', '=', $request->id_user);
        if ($admin) {
            $admin = $admin->first();
            $admin->update([
                'id_user'   => $request->id_user,
                'no_hp'     => $request->no_hp,
                'alamat'    => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota'      => $request->kota,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            return back()->with('success', 'Profil Berhasil Diedit');
        } else {
            Admin::create([
                'id_user'   => $request->id_user,
                'no_hp'     => $request->no_hp,
                'alamat'    => $request->alamat,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kota'      => $request->kota,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            return back()->with('success', 'Profil Berhasil Ditambahkan');
        }
        
    }
}
