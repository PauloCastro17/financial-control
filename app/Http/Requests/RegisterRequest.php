<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=> 'required|string|max:255',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6|max:60|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            //NAME
            'name.required' => 'O campo nome é obrigatorio!',
            'name.max' => 'O campo nome deve ter no máximo 255 caractere!',
            'name.string' => 'O nome deve ser um texto válido!',
            //EMAIL
            'email.required' => 'O campo e-mail é obrigatorio!',
            'email.email' => 'O campo e-mail deve ser um endereço de e-mail valido!',
            'email.unique' => 'Este e-mail já encontra-se em nosso sistema!',
            //PASSWORD
            'password.required' => 'O campo senha é obrigatorio!',
            'password.min' => 'O campo senha deve ter no mínimo 6 caracteres!',
            'password.max' => 'O campo senha deve ter no máximo 60 caracteres!',
            'password.confirmed' => 'As senhas não coincidem!',
        ];
    }
}
