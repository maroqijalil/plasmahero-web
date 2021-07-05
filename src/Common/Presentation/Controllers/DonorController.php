<?php

namespace App\Common\Controllers;

use App\Common\Models\Donor;
use App\Common\Models\Pengguna;
use App\Controller\BaseController;
use Illuminate\Http\Request;
use App\Common\Services\QRCodeServiceInterface;
use App\Common\Repositories\DonorRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DonorController extends BaseController
{
  protected $qrCodeGenerator;
  protected $donorRepository;

  // public function __construct(QRCodeServiceInterface $qrCodeService, DonorRepositoryInterface $donorRepository)
  // {
  //   $this->qrCodeGenerator = $qrCodeService;
  //   $this->donorRepository = $donorRepository;
  // }

  public function index()
  {
    $pengguna = Auth::user()->pengguna;
    $isDataDiriComplete = $pengguna->no_hp && $pengguna->alamat && $pengguna->kelurahan && $pengguna->kecamatan && $pengguna->kota;
    $isDataDonorComplete = $pengguna->usia && $pengguna->jenis_kelamin && $pengguna->gol_darah && $pengguna->rhesus && $pengguna->berat_badan && $pengguna->tanggal_swab;
    $isAllComplete = $isDataDiriComplete && $isDataDiriComplete && $pengguna->nama_tipe;
    return view('user.donor.prosesdonor', compact(['pengguna', 'isDataDiriComplete', 'isDataDonorComplete', 'isAllComplete']));
  }

  public function store(Request $request)
  {
    if (Auth::user()->pengguna->status == 's' || Auth::user()->pengguna->status == 'g')
      return back()->with('already', 'Anda sudah melakukan pendaftaran donor');

    Auth::user()->pengguna->update([
      'no_hp' => $request->no_hp,
      'alamat' => $request->alamat,
      'kelurahan' => $request->kelurahan,
      'kecamatan' => $request->kecamatan,
      'kota' => $request->kota,
      'usia' => $request->usia,
      'jenis_kelamin' => $request->jenis_kelamin,
      'gol_darah' => $request->gol_darah,
      'rhesus' => $request->rhesus,
      'berat_badan' => $request->berat_badan,
      'tanggal_swab' => $request->tanggal_swab,

      'nama_tipe' => $request->nama_tipe,
      'status' => ($request->nama_tipe == 'pendonor' ? 'g' : 's'),

    ]);

    if ($request->nama_tipe == "pendonor") {
      Donor::create([
        'id_pendonor' => Auth::user()->pengguna->id,
        'tipe' => 'plasma',
        'alamat' => $request->alamat,
        'kelurahan' => $request->kelurahan,
        'kecamatan' => $request->kecamatan,
        'kota' => $request->kota,

      ]);

      $this->sendToPendonor([
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
      ]);
    } else if ($request->nama_tipe == "penerima") {
      Donor::create([
        'id_penerima' => Auth::user()->pengguna->id,
        'tipe' => 'plasma',
        'alamat' => $request->alamat,
        'kelurahan' => $request->kelurahan,
        'kecamatan' => $request->kecamatan,
        'kota' => $request->kota,

      ]);

      $data = [
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
      ];

      $this->sendToPenerima($data);
    }

    return back()->with('success', 'Anda berhasil mendaftar proses pendonoran');
  }

  public function fetch()
  {
    $donor = $this->donorRepository->all();

    return $this->sendResponse($donor, "Daftar donor berhasil di dapatkan");
  }

  protected function sendToPendonor($data)
  {
    // dd($data);
    Mail::send('user.donor.emailToPendonor', $data, function ($mail) use ($data) {
      $mail->to($data['email'], 'no-reply')->subject('Pendaftaran sebagai Pendonor plasma di Plasmahero.id');
      $mail->from('erikfaderik@gmail.com', 'Plasmahero');
    });
  }

  protected function sendToPenerima($data)
  {
    Mail::send('user.donor.emailToPenerima', $data, function ($mail) use ($data) {
      $mail->to($data['email'], 'no-reply')->subject('Pendaftaran sebagai Pencari donor plasma di Plasmahero.id');
      $mail->from('erikfaderik@gmail.com', 'Plasmahero');
    });
  }
}
