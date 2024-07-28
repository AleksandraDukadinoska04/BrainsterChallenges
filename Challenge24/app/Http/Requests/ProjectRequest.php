<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name' => 'required',
            'subtitle' => 'required',
            'photo' => 'required|url',
            'URL' => 'required|url',
            'description' => 'required|max:200',
            'created_at' => 'required',
            'updated_at' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Полето за емаил е задолжително!',
            'subtitle.required' => 'Полето за поднаслов е задолжително!',
            'photo.required' => 'Полето за слика е задолжително!',
            'photo.url' => 'Ве молиме внесете валидно URL за слика!',
            'URL.required' => 'Полето за URL е задолжително!',
            'URL.url' => 'Ве молиме внесете валидно URL!',
            'description.required' => 'Полето за опис е задолжително!',
            'description.max' => 'Описот не смее да содржи повеќе од 200 карактери!'
        ];
    }
}
