<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question' => 'required|string',
            'answer' => 'required|string',
            // Add any additional validation rules as needed
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
            // Add any custom error messages for specific rules
        ];
    }
}

