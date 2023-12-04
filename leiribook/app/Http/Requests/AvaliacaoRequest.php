<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required|string',
            'nivel' => 'required|in:1,2,3,4,5',
            'livro_id' => 'required',
            'user_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'O campo descrição deve ser uma string.',
            'nivel.required' => 'O campo nível é obrigatório.',
            'nivel.in' => 'O campo nível deve ser um dos valores: 1, 2, 3, 4, 5.',
            'livro_id.required' => 'O campo livro_id é obrigatório.',
            'user_id.required' => 'O campo user_id é obrigatório.',
        ];
    }
}
