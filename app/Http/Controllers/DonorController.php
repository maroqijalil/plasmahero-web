<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QRCodeServiceInterface;

class DonorController extends Controller
{
    protected $qrCodeGenerator;

    public function __construct(QRCodeServiceInterface $qrCodeService)
    {
        $this->qrCodeGenerator = $qrCodeService;
    }

    public function store() {

        $tanggal = "DUMMY DATA";

        $this->qrCodeGenerator->generateQrCode($tanggal);
            return view('qr-code');
    }
}
