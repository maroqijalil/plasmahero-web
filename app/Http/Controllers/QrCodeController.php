<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

class QrCodeController extends Controller
{
	public function index()
	{
		$data = 'https://www.youtube.com/watch?v=DLzxrzFCyOs&t=43s';

		// <pre> to view it in a browser
		echo '<img src="'.(new QRCode)->render($data).'" alt="QR Code" />';


		// custom values
		$options = new QROptions([
			'version'      => 5,
			'outputType'   => QRCode::OUTPUT_STRING_TEXT,
			'eccLevel'     => QRCode::ECC_L,
			'moduleValues' => [
				// finder
				1536 => 'A', // dark (true)
				6    => 'a', // light (false)
				// alignment
				2560 => 'B',
				10   => 'b',
				// timing
				3072 => 'C',
				12   => 'c',
				// format
				3584 => 'D',
				14   => 'd',
				// version
				4096 => 'E',
				16   => 'e',
				// data
				1024 => 'F',
				4    => 'f',
				// darkmodule
				512  => 'G',
				// separator
				8    => 'h',
				// quietzone
				18   => 'i',
			],
		]);

		// <pre> to view it in a browser
		echo '<pre style="font-size: 75%; line-height: 1;">' . (new QRCode($options))->render($data) . '</pre>';

		return '';
	}
}
