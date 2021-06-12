<?php

namespace App\Common\Controllers;

use App\Controller\Controller;
use Illuminate\Http\Request;
use App\Common\Services\QRCodeServiceInterface;

class DonorController extends Controller
{
  protected $qrCodeGenerator;

  public function __construct(QRCodeServiceInterface $qrCodeService)
  {
    $this->qrCodeGenerator = $qrCodeService;
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
}
