<?php

namespace App\Http\Requests\Wheel;

use Illuminate\Foundation\Http\FormRequest;

class StoreWheelRequest extends FormRequest
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
            'inputs' => 'required|array',
            'car_id' => 'required|integer',

        ];
    }
}
