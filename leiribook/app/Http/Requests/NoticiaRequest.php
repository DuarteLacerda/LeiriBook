<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaRequest extends FormRequest
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
            'data' => 'nullable|date',
            'foto' => ($this->noticia? 'nullable':'required').'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'data.required' => 'O campo data é obrigatório.',
            'data.date' => 'O campo data deve ser uma data válida.',
            'foto.required' => 'O campo foto é obrigatório.',
            'foto.image' => 'O arquivo deve ser uma imagem.',
            'foto.mimes' => 'O arquivo deve ser do tipo: jpeg, png, jpg, gif ou svg.',
            'foto.max' => 'A foto não deve ser maior que 2048 kilobytes.',
            'user_id.required' => 'O campo user_id é obrigatório.',
        ];
    }
}

