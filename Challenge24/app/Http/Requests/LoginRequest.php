<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Полето за емаил е задолжително!',
            'email.email' => 'Ве молиме внесете валидна емаил адреса!',
            'password.required' => 'Полето за пасворд е задолжително!',
            'password.min' => 'Пасвордот мора да содржи најмалку 6 карактери!'
        ];
    }
}
