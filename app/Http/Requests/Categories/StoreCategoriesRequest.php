<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesRequest extends FormRequest {
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
            'name' => [
                'required',
                'string',
                'unique:categories,name',
                'min:3',
                'max:100',
                'regex:/^[a-zA-Z0-9\s\-]+$/', // Example: Allows letters, numbers, spaces, and hyphens
            ],
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id', // Example: Validates that the parent ID exists in the categories table
            ],
            'description' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'status'=>[
                'required',
                'in:active,archived',
            ]
        ];
    }

}