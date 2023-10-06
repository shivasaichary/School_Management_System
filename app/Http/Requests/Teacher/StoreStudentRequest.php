<?php

namespace App\Http\Requests\Teacher; // Update the namespace to match your project structure

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return Gate::allows('student.create');
        return true;
    }

    public function rules(): array
    {
        return [
            'student_name'     => ['required', 'string', 'max:255'],
            'age'      => ['required', 'integer'],
            'gender' => ['required', 'string','in:Male,Female,Other'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required', 'string', 'max:255'],
            // 'stripe_customer_id' => ['required', 'string', 'max:255'],

        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'cls_code.required' => 'The class is required.',
    //         'cls_code.exists' => 'The selected class does not exist.',
    //         'name.required' => 'The student name is required.',
    //         'name.string' => 'The student name must be a string.',
    //         'name.max' => 'The student name must not exceed 255 characters.',
    //         'age.required' => 'The student age is required.',
    //         'age.integer' => 'The student age must be an integer.',
    //     ];
    // }
}
