<?php

namespace App\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendonoranRequest extends FormRequest
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
            'id_admin' => 'required',
            'id_pendonor' => 'required',
            'id_penerima' => 'required',
        ];
    }
}
