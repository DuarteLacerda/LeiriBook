<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
            'edicao' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adapte a regra de validação para o campo 'foto' conforme necessário
            'user_id' => 'required', // Não é necessário exists nesta versão
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
            'edicao.required' => 'O campo edição é obrigatório.',
            'edicao.string' => 'O campo edição deve ser uma string.',
            'foto.required' => 'O campo foto é obrigatório.',
            'user_id.required' => 'O campo user_id é obrigatório.',
        ];
    }
}

