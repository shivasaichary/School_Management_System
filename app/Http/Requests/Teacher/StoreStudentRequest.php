<?php

namespace App\Http\Requests\Teacher; // Update the namespace to match your project structure

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('student.create');
    }

    public function rules(): array
    {
        return [
            'cls_code' => ['required', 'exists:classes,id'], // Assuming you have a 'classes' table
            'name'     => ['required', 'string', 'max:255'],
            'age'      => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'cls_code.required' => 'The class is required.',
            'cls_code.exists' => 'The selected class does not exist.',
            'name.required' => 'The student name is required.',
            'name.string' => 'The student name must be a string.',
            'name.max' => 'The student name must not exceed 255 characters.',
            'age.required' => 'The student age is required.',
            'age.integer' => 'The student age must be an integer.',
        ];
    }
}
