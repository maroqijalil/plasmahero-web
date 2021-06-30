<?php

namespace App\Common\Services;

interface QRCodeServiceInterface 
{
    public function generateQrCode($data);
}