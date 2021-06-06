<?php

namespace App\Services;

interface QRCodeServiceInterface 
{
    public function generateQrCode($data);
}