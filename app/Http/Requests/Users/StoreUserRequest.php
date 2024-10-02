<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    /**
    * Determine if the user is authorized to make this request.
    */

    public function authorize(): bool {
        return true;
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */

    public function rules(): array {
        return [
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i' ],
            'phone' => [ 'required', 'string', 'unique:users', 'regex:/^\+?[0-9]{10,14}$/i' ],
            'image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
            'password' => [ 'required', 'confirmed', Rules\Password::defaults() ],
        ];
    }

    function messages() {

        return [
            'email.regex' => 'The email must be a valid email address.',
            'phone.regex' => 'The phone number must be a valid phone number.',
        ];
    }
}
