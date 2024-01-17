<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'titulo' => 'required|string',
            'descricao' => 'required|string',
            'autor' => 'required|string',
            'foto' => 'required', // Adapte a regra de validação para o campo 'foto' conforme necessário
            'edicao' => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required' => 'O campo título é obrigatório.',
            'titulo.string' => 'O campo título deve ser uma string.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'O campo descrição deve ser uma string.',
            'autor.required' => 'O campo autor é obrigatório.',
            'autor.string' => 'O campo autor deve ser uma string.',
            'foto.required' => 'O campo foto é obrigatório.',
            'edicao.required' => 'O campo edição é obrigatório.',
            'edicao.string' => 'O campo edição deve ser uma string.',
            'user_id.required' => 'O campo user_id é obrigatório.',
        ];
    }
}

