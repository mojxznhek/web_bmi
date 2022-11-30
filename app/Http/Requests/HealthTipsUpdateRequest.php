<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthTipsUpdateRequest extends FormRequest
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
            'health_category_id' => ['required', 'exists:health_categories,id'],
            'url' => ['required', 'url'],
            'description' => ['required', 'max:255', 'string'],
            'content' => ['required', 'max:255', 'string'],
            'source' => ['required', 'max:255', 'string'],
        ];
    }
}
