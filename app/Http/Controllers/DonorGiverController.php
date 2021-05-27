<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use App\Models\User;
use Auth;

class DonorGiverController extends Controller
{
    public function index () {
        return view('layouts.user.donor.fill-user-detail');
    }

    public function store (Request $request) {
        $this->validate($request, [
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'gol_dar' => 'required',
            'rhesus' => 'required',
            'berat_badan' => 'required',
            'tgl_swab' => 'required',
        ]);

        UserDetail::create([
            'user_id' => Auth::user()->id,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'gol_dar' => $request->gol_dar,
            'rhesus' => $request->rhesus,
            'berat_badan' => $request->berat_badan,
            'tgl_swab' => $request->tgl_swab,
        ]);

        return back()->with('success', 'Detail data berhasil diisi!');
    }

    public function show() {
        $users = User::get();
        return view('layouts.admin.donor.donor-giver', ['users' => $users]);
    }
}
