<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'nome' => 'required|string',
            'descricao' => 'required|string',
            'local' => 'required|string',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
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
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.string' => 'O campo nome deve ser uma string.',
            'descricao.required' => 'O campo descricao é obrigatório.',
            'descricao.string' => 'O campo descricao deve ser uma string.',
            'local.required' => 'O campo local é obrigatório.',
            'local.string' => 'O campo local deve ser uma string.',
            'data_inicio.required' => 'O campo data_inicio é obrigatório.',
            'data_inicio.date' => 'O campo data_inicio deve ser uma data válida.',
            'data_fim.required' => 'O campo data_fim é obrigatório.',
            'data_fim.date' => 'O campo data_fim deve ser uma data válida.',
            'data_fim.after_or_equal' => 'O campo data_fim deve ser igual ou posterior à data_inicio.',
            'user_id.required' => 'O campo user_id é obrigatório.',
        ];
    }
}

