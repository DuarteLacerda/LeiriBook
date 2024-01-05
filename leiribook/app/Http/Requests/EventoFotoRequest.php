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
            'titulo' => 'required|string|unique:eventos_fotos,titulo,'.($this->foto? $this->foto->id:''),
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
            'fotos.required' => 'O campo fotos é obrigatório.',
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.string' => 'O campo tipo deve ser uma string.',
            'evento_id.required' => 'O campo evento_id é obrigatório.',
        ];
    }
}

