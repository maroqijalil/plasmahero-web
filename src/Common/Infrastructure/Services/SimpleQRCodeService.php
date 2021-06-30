<?php

namespace App\Common\Services;

class SimpleQRCodeService implements QRCodeServiceInterface
{
	public function generateQrCode($data) 
	{
		$path = time() . '-' . generateRandomString(8);
		\QrCode::size(500)
				->format('png')
				->generate($data['tanggal'] . '-' . $data['waktu'], public_path($path));
		
		return $path;
	}
}

function generateRandomString($length)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
