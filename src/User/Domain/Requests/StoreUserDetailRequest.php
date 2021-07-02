<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDetailRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'no_hp' => ['required'],
			'alamat' => ['required'],
			'kelurahan' => ['required'],
			'kecamatan' => ['required'],
			'kota' => ['required'],
			'usia' => ['required'],
			'jenis_kelamin' => ['required'],
			'gol_darah' => ['required'],
			'rhesus' => ['required'],
			'berat_badan' => ['required'],
			'tanggal_swab' => ['required']
		];
	}
}
