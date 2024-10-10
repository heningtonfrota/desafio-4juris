<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'string|min:3|max:255',
            'user_id' => 'nullable|integer|exists:users,id',
        ];

        if ($this->isMethod('post')) {
            $rules['name'] = 'required|string|min:3|max:255';
            $rules['user_id'] = 'required|integer|exists:users,id';
        } elseif ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['name'] = 'nullable|string|min:3|max:255,' . $this->route('user');
            $rules['user_id'] = 'nullable|integer|exists:users,id';
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string'   => 'O campo :attribute deve ser uma string.',
            'min'      => 'O campo :attribute deve ter pelo menos :min caracteres.',
            'max'      => 'O campo :attribute não pode ter mais que :max caracteres.',
            'integer'  => 'O campo :attribute deve ser um número inteiro.',
            'exists'   => 'O :attribute fornecido não existe.',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'user_id' => 'id usuário'
        ];
    }
}
