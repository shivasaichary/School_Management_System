<?php

namespace App\Http\Requests\Teacher; // Update the namespace to match your project structure

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreClsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('cls.create');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The class name is required.',
            'name.string' => 'The class name must be a string.',
            'name.max' => 'The class name must not exceed 255 characters.',
        ];
    }
}
