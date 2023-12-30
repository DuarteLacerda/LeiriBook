<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.max' => 'O nome não pode ser maior que :max characters.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor insira um email válido.',
            'email.unique' => 'Este email já foi registado.',
            'password.required' => 'O campo password é obrigatório.',
            'password.min' => 'A password deve ter no minimo :min characters.',
            // Add more custom error messages as needed
        ];
    }
}
