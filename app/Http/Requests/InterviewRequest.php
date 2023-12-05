<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterviewRequest extends FormRequest
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
            'full_name' => ['required', 'max:50', 'min:3'],
            'phone_number' => ['required', 'max:50', 'min:3'],
            'email' => ['required', 'max:50', 'email'],
            'ip_address' => ['required', 'max:20'],
            'status' => ['required', 'max:9'],
        ];
    }
}
