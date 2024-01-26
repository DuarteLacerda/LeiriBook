<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivrosCategoriasRequest extends FormRequest
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
        'categoria_id' => 'required|exists:categorias,id',
    ];
}

public function messages(): array
{
    return [
        'categoria_id.required' => 'Por favor selecione um género.',
        'categoria_id.exists' => 'A Categoria selecionada não existe.',
    ];
}
}
