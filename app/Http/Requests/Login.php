<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Login extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Por favor ingrese un correo electrónico.',
            'email.email' => 'Por favor ingrese una dirección de correo electrónico válida.',
            'password.required' => 'Por favor ingrese una contraseña.',
        ];
    }
}
