<?php

namespace App\Common\Controllers;

use App\Common\Models\Partisipan;
use App\Common\Models\Pesan;
use App\Controller\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class ChatController extends BaseController {
  
  public function show() {
    return $this->nullHandlePartisipans(null);
  }

  public function index($active_chat) {
    return $this->nullHandlePartisipans($active_chat);
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


  /* utility */
  public function getPartisipans($id) {
    return Partisipan::where('id_admin', '=', $id)
                      ->orWhere('id_pendonor', '=', $id)
                      ->orWhere('id_penerima', '=', $id)
                      ->get();
  }

  public function nullHandlePartisipans($active_chat) {
    $partisipans = $this->getPartisipans(Auth::user()->id);
    try {
      $show_chat = $partisipans->where('id', '=', $active_chat)->first(); //grup yang aktif
      return view('common.layouts.chat', compact(['partisipans', 'active_chat', 'show_chat']));
    } catch (Exception $e) {
      $show_chat = null;
      return view('common.layouts.chat', compact(['partisipans', 'active_chat', 'show_chat']));
    }
  }
}