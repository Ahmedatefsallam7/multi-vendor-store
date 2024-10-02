<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriesRequest extends FormRequest {
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
                'sometimes',
                'string',
                'min:3',
                'max:100',
                "unique:categories,name,{$this->id}",
                'regex:/^[a-zA-Z0-9\s\-]+$/',
            ],
            'parent_id' => [
                'nullable',
                'integer',
                'exists:categories,id',
            ],
            'description' => [
                'sometimes',
                'string',
                'min:3',
                'max:255',
            ],
            'status' => [
                'sometimes',
                'in:active,archived',
            ],
        ];
    }

}