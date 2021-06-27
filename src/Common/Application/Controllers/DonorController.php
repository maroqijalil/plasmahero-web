<?php

namespace App\Common\Controllers;

use App\Controller\BaseController;
use Illuminate\Http\Request;
use App\Common\Interfaces\QRCodeServiceInterface;
use App\Common\Interfaces\DonorRepositoryInterface;

class DonorController extends BaseController
{
  protected $qrCodeGenerator;
  protected $donorRepository;

  public function __construct(QRCodeServiceInterface $qrCodeService, DonorRepositoryInterface $donorRepository)
  {
    $this->qrCodeGenerator = $qrCodeService;
    $this->donorRepository = $donorRepository;
  }

  public function index()
  {
    return view('layouts.user.donor.pendonoran');
  }

  public function store(Request $request)
  {
    $data = [
      "tanggal" => $request->tanggal,
      "waktu" => $request->waktu
    ];

    $qrCodePath = $this->qrCodeGenerator->generateQrCode($data);
    return view('layouts.user.qr-code', compact('qrCodePath'));
  }

  public function fetch()
  {
    $donor = $this->donorRepository->all();
    return $this->sendResponse($donor, "Daftar donor berhasil di dapatkan");
  }
}
