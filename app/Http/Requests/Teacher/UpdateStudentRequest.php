<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('student.update');
    }

    public function rules(): array
    {
        return [
            'class_id' => ['required', 'exists:classes,id'],
            'name'     => ['required', 'string', 'max:255'],
            'age'      => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'class_id.required' => 'The class is required.',
            'class_id.exists'   => 'The selected class does not exist.',
            'name.required'     => 'The student name is required.',
            'name.string'       => 'The student name must be a string.',
            'name.max'          => 'The student name must not exceed 255 characters.',
            'age.required'      => 'The student age is required.',
            'age.integer'       => 'The student age must be an integer.',
        ];
    }
}
