<?php

namespace App\Http\Requests;

use App\Rules\MatchCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class ResetPassword extends FormRequest
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
            'current_password' => ['required', 'min:3', new MatchCurrentPassword],
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3'
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => 'Password tidak sama dengan Konfirmasi Password'
        ];
    }
}
