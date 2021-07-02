<?php

namespace App\Admin\Controllers;

use App\Common\Models\Partisipan;
use App\Common\Models\Pencocokan;
use App\Common\Models\Percakapan;
use App\Controller\BaseController;
use Carbon\Carbon;

class ChatController extends BaseController {

  public function create($id) {
    $pencocokan = Pencocokan::findOrFail($id);
    $percakapan = Percakapan::create([
      'judul' => 'pencocokan_' . $pencocokan->id_pendonor. '_' .  $pencocokan->id_penerima, 
      'dimulai_pada' => Carbon::now()
    ]);
    $partisipan = Partisipan::create([
      'id_percakapan' => $percakapan->id,
      'id_admin' => $pencocokan->admin->user->id,
      'id_pendonor' => $pencocokan->pendonor->user->id,
      'id_penerima' => $pencocokan->penerima->user->id
    ]);

    return redirect()->back()->with('success', 'berhasil membuat group chat');
  }
}