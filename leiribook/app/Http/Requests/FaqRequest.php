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
            'question' => 'required|unique:faqs|string',
            'answer' => 'required|string',
            // Add any additional validation rules as needed
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'O campo Pergunta é obrigatório.',
            'answer.required' => 'O campo Resposta é obrigatório.',
            // Add any custom error messages for specific rules
        ];
    }
}
