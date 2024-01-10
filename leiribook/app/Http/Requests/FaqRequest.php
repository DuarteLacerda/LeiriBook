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
            'question' => 'required|string|unique:faqs,question,' . ($this->faq ? $this->faq->id : ''),
            'answer' => 'required|string',
            'approved' => 'required|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'O campo Pergunta é obrigatório.',
            'answer.required' => 'O campo Resposta é obrigatório.',
            'approved.required' => 'O campo Aprovado é obrigatório.',
            'question.unique' => 'A pergunta já existe.',
        ];
    }
}
