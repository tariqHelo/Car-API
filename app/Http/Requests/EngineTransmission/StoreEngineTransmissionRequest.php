<?php

namespace App\Http\Requests\EngineTransmission;

use Illuminate\Foundation\Http\FormRequest;

class StoreEngineTransmissionRequest extends FormRequest
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
            //array json validation
            //validate $request->data as array

        ];
    }
}
