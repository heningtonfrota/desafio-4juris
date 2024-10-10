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
        $rules = [
            'name' => 'string|min:3|max:255|',
            'email' => 'email|',
            'company_id' => 'nullable|integer|exists:companies,id',
        ];

        if ($this->isMethod('post')) {
            $rules['name'] .= 'required';
            $rules['email'] .= 'required|unique:users,email';
            $rules['password'] = 'required|string|min:8';
        } else if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] .= 'nullable';
            $rules['email'] .= 'nullable|unique:users,email,' . $this->route('user');
            $rules['password'] = 'nullable|string|min:8';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'min' => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'max' => 'O campo :attribute não pode ter mais que :max caracteres.',
            'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
            'unique' => 'O :attribute já está em uso.',
            'integer' => 'O campo :attribute deve ser um número inteiro.',
            'exists' => 'O :attribute fornecido não existe.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'email' => 'endereço de e-mail',
            'password' => 'senha',
            'company_id' => 'id usuário',
        ];
    }
}
