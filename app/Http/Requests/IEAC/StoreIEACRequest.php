<?php

namespace App\Http\Requests\IEAC;

use Illuminate\Foundation\Http\FormRequest;

class StoreIEACRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'car_id' => 'required|integer',
            //validate inputs array
            'inputs' => 'required|array',

        ];
    }
}
