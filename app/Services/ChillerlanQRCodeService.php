<?php

namespace App\Services;

use App\Services\QRCodeServiceInterface;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class ChillerlanQRCodeService implements QRCodeServiceInterface
{
	public function generateQrCode()
	{
		$path = public_path('images/qrcode2.png');
		$data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';
		
		$options = new QROptions([
			'version'    => 5,
			'outputType' => 'png',
			'eccLevel'   => QRCode::ECC_L,
		]);

		$qrcode = new QRCode($options);
		$qrcode->render($data, $path);
	}
}
