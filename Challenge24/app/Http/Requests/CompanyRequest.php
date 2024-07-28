<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|numeric',
            'company' => 'required|max:255',
            'created_at' => 'required',
            'updated_at' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Полето за емаил е задолжително!',
            'email.email' => 'Ве молиме внесете валидна емаил адреса!',
            'email.max' => 'Емајлот не смее да има повеќе од 255 карактери!',
            'phoneNumber.required' => 'Полето за телефонски број е задолжително!',
            'phoneNumber.numeric' => 'Ве молиме внесете валиден телефонски број!',
            'company.required' => 'Полето за име на компанијата е задолжително!',
            'company.max' => 'Името на компанијата не смее да е поголемо од 255 карактери!'
        ];
    }
}
