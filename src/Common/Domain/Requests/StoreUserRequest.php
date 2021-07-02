<?php

namespace App\Common\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class StoreUserRequest extends FormRequest
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		return [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'unique:users', 'max:255'],
			'password' => ['required', 'confirmed', Rules\Password::defaults()]
		];
	}
}
