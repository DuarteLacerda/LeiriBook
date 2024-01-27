<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoFotoRequest extends FormRequest
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
            'ordem' => 'required|integer',
            'foto' => ($this->foto? 'nullable':'required').'|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'titulo.unique' => 'O título desta imagem já existe noutro registo.',
            'foto.required' => 'O campo fotos é obrigatório.',
            'foto.image' => 'O arquivo deve ser uma imagem.',
            'foto.mimes' => 'O arquivo deve ser do tipo: jpeg, png, jpg, gif ou svg.',
            'foto.max' => 'A foto não deve ser maior que 2048 kilobytes.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.string' => 'O campo tipo deve ser uma string.',
            'evento_id.required' => 'O campo evento_id é obrigatório.',
        ];
    }
}

