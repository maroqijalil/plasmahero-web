<?php

namespace App\Services;

use App\Services\QRCodeServiceInterface;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class ChillerlanQRCodeService implements QRCodeServiceInterface
{
	public function generateQrCode($data)
	{
		$path = public_path('images/qrcode2.png');
		
		$options = new QROptions([
			'version'    => 5,
			'outputType' => 'png',
			'eccLevel'   => QRCode::ECC_L,
		]);

		$qrcode = new QRCode($options);
		$qrcode->render($data, $path);
	}
}
