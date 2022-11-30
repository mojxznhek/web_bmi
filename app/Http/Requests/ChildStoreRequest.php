<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildStoreRequest extends FormRequest
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
            'photo' => ['nullable', 'file'],
            'completename' => ['required', 'max:50', 'string'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'in:male,female'],
            'mothersName' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'address' => ['required', 'max:255', 'string'],
        ];
    }
}
