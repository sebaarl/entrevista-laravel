<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'color1' => 'required',
            'color2' => 'required',
            'color3' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Por favor ingrese un nombre.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 255 caracteres.',
            'email.required' => 'Por favor ingrese un correo electrónico.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'Por favor ingrese una contraseña.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'color1.required' => 'Por favor ingrese un color.',
            'color2.required' => 'Por favor ingrese un color.',
            'color3.required' => 'Por favor ingrese un color.',
        ];
    }
}
