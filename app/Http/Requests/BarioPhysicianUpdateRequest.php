<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarioPhysicianUpdateRequest extends FormRequest
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
            'completename' => ['required', 'max:255', 'string'],
            'profession' => ['required', 'max:255', 'string'],
            'license_no' => ['required', 'max:255', 'string'],
        ];
    }
}
