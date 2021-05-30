<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserDetailRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'id_user' => ['required'],
			'no_hp' => ['required'],
			'alamat' => ['required'],
			'kelurahan' => ['required'],
			'kecamatan' => ['required'],
			'kota' => ['required'],
			'nama_tipe' => ['required'],
			'usia' => ['required'],
			'jenis_kelamin' => ['required'],
			'gol_darah' => ['required'],
			'rhesus' => ['required'],
			'berat_badan' => ['required'],
			'tanggal_swab' => ['required']
		];
	}
}
