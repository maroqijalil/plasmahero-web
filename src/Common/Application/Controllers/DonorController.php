<?php

namespace App\Common\Controllers;

use App\Common\Models\Donor;
use App\Controller\BaseController;
use Illuminate\Http\Request;
use App\Common\Repositories\QRCodeServiceInterface;
use App\Common\Repositories\DonorRepositoryInterface;
use Illuminate\Support\Facades\Auth;

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
    return view('user.donor.pendonoran');
  }

  public function donorkan(Request $request)
  {
  }

  public function carikanidx()
  {
    $data = Auth::user()->pengguna;
    return view('user.donor.carikan-plasma', compact('data'));
  }

  public function carikan(Request $request)
  {
    if (Auth::user()->pengguna->status == 's')
      return back()->with('already', 'Anda sudah melakukan pendaftaran donor');

    Auth::user()->pengguna->update([
      'id_user' => $request->id_user,
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

      'nama_tipe' => 'penerima',
      'status' => 's',

    ]);

    Donor::create([
      'id_penerima' => Auth::user()->pengguna->id,
      'tipe' => 'plasma',
      'alamat' => $request->alamat,
      'kelurahan' => $request->kelurahan,
      'kecamatan' => $request->kecamatan,
      'kota' => $request->kota,

    ]);

    return back()->with('success', 'Anda berhasil mendaftar sebagai pencari donor');
  }

  public function store(Request $request)
  {
    $data = [
      "tanggal" => $request->tanggal,
      "waktu" => $request->waktu
    ];

    // $qrCodePath = $this->qrCodeGenerator->generateQrCode($data);
    // return view('user.qr-code', compact('qrCodePath'));
  }

  public function fetch()
  {
    $donor = $this->donorRepository->all();
    return $this->sendResponse($donor, "Daftar donor berhasil di dapatkan");
  }
}
