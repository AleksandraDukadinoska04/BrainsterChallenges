<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'home_team' => 'required|integer|exists:teams,id|different:guest_team',
            'guest_team' => 'required|integer|exists:teams,id|different:home_team',
            'date' => 'required|date',
            'result' => 'nullable|string|max:255'
        ];
    }
}
