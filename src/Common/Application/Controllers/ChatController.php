<?php

namespace App\Common\Controllers;

use App\Common\Models\Partisipan;
use App\Common\Models\Pesan;
use App\Controller\BaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Exception;

class ChatController extends BaseController {
  
  public function show() {
    return $this->printChatData(null);
  }

  public function index($active_chat) {
    return $this->printChatData($active_chat);
  }

  public function store(Request $request) {
    $pesan = Pesan::create([
      'id_partisipan' => $request->id_partisipan,
      'id_pengirim' => $request->id_pengirim,
      'isi' => $request->isi,
      'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
    ]);
    $partisipan = $pesan->partisipan;
    $partisipan = $partisipan->update(['updated_at' => Carbon::now()->format('Y-m-d H:i:s')]);
    return redirect()->back()->with('success', 'chat terkirim');
  }


  /* utility */
  public function printChatData($active_chat) {
    $partisipans = $this->getPartisipans(Auth::user()->id);
    $pesan = new Collection;
    foreach($partisipans as $partisipan) {
      $pesan = $pesan->union($partisipan->pesan->where('id_pengirim', '!=', Auth::user()->id));
    }
    $pesan = $pesan->sortBy([['updated_at', 'desc']]);
    $pesan = $pesan->take(10);
    return $this->nullHandlePartisipans($active_chat, $pesan, 'notifikasi_pesan');
  }

  public function getPartisipans($id) {
    return Partisipan::where('id_admin', '=', $id)
                      ->orWhere('id_pendonor', '=', $id)
                      ->orWhere('id_penerima', '=', $id)
                      ->get();
  }

  public function nullHandlePartisipans($active_chat, $notifikasi_pesan, $var_name) {
    $partisipans = $this->getPartisipans(Auth::user()->id);
    try {
      $show_chat = $partisipans->where('id', '=', $active_chat)->first(); //grup yang aktif
      return view('common.layouts.chat', compact(['partisipans', 'active_chat', 'show_chat', $var_name]));
    } catch (Exception $e) {
      $show_chat = null;
      return view('common.layouts.chat', compact(['partisipans', 'active_chat', 'show_chat', $var_name]));
    }
  }
}