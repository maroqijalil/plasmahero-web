<?php

namespace App\Common\Controllers;

use App\Common\Models\Partisipan;
use App\Common\Models\Pesan;
use App\Controller\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends BaseController {
  
  public function show() {
    $partisipans = Partisipan::where('id_admin', '=', Auth::user()->id)
                            ->orWhere('id_penerima', '=', Auth::user()->id)
                            ->orWhere('id_penerima', '=', Auth::user()->id)
                            ->get();
    $active_chat = $partisipans->first()->id;
    return view('common.layouts.chat', compact(['partisipans', 'active_chat']));
  }

  public function index($active_chat) {
    $partisipans = Partisipan::where('id_admin', '=', Auth::user()->id)
                            ->orWhere('id_penerima', '=', Auth::user()->id)
                            ->orWhere('id_penerima', '=', Auth::user()->id)
                            ->get();
    return view('common.layouts.chat', compact(['partisipans', 'active_chat']));
  }

  public function store(Request $request) {
    $pesan = Pesan::create([
      'id_partisipan' => $request->id_partisipan,
      'id_pengirim' => $request->id_pengirim,
      'isi' => $request->isi,
      'created_at' => Carbon::now(),
    ]);
    return redirect()->back()->with('success', 'chat terkirim');
  }
}