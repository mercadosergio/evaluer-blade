<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required'],
            'password' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El usuario es requerido.',
            'password.required' => 'La contraseña es requerida.'
        ];
    }

    public function getCredentials()
    {
        $username = $this->get('username');
        if ($this->isEmail($username)) {
            return [
                'email' => $username,
                'password' => $this->get('password'),
            ];
        }

        return $this->only('username', 'password');
    }

    public function isEmail($value)
    {
        $factory = $this->container->make(ValidationFactory::class);
        return !$factory->make(['username' => $value], ['username' => 'email'])->fails();
    }
}
