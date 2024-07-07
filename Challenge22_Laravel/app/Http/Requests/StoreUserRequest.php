<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:15|alpha',
            'lastname' => 'required|max:25|alpha',
            'email' => 'nullable|email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required!',
            'lastname.required' => 'The lastname field is required!',
            'name.max:15' => 'The name may not be greater than 15 characters!',
            'lastname.max:25' => 'The lastname may not be greater than 15 characters!',
            'name.alpha' => 'The name may only contain letters!',
            'lastname.alpha' => 'The lastname may only contain letters!',
            'email.email' => 'The email must be a valid email adress!'
        ];
    }
}
