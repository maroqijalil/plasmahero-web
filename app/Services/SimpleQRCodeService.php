<?php

namespace App\Services;

use App\Services\QRCodeServiceInterface;

class SimpleQRCodeService implements QRCodeServiceInterface
{
    public function generateQrCode() 
    {
        $path = 'images/qrcode.png';
        \QrCode::size(500)
                ->format('png')
                ->generate('https://github.com/maroqijalil/plasmahero-web', public_path($path));
        
        return $path;
    }
}
