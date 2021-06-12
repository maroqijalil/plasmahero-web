<?php

namespace App\Common\Interfaces;

interface QRCodeServiceInterface 
{
    public function generateQrCode($data);
}