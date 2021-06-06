<?php

namespace App\Services;

class SimpleQRCodeService implements QRCodeServiceInterface
{
    public function generateQrCode() 
    {
        \QrCode::size(500)
                ->format('png')
                ->generate('https://github.com/maroqijalil/plasmahero-web', public_path('images/qrcode.png'));
        
        return view('qr-code');
    }
}
