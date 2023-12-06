<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteresseRequest extends FormRequest
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
            'data_leitura' => 'required|date',
            'estado' => 'required',
            'livro_id' => 'required', // Não é necessário exists nesta versão
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
            'data_leitura.required' => 'O campo data_leitura é obrigatório.',
            'data_leitura.date' => 'O campo data_leitura deve ser uma data válida.',
            'estado.required' => 'O campo estado é obrigatório.',
            'livro_id.required' => 'O campo livro_id é obrigatório.',
        ];
    }
}
