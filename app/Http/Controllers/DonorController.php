<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonorController extends Controller
{
    protected $qrCodeGenerator;

    public function __construct(QRCodeServiceInterface $qrCodeService)
    {
        $this->qrCodeGenerator = $qrCodeService;
    }

    public function store(Request $request) {

        $tanggal = $request->tanggal;

        $this->qrCodeGenerator->generateQrCode($tanggal);
            return redirect('/');
    }
}
