<?php

namespace App\Http\Requests\Teacher;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return Gate::allows('student.update');
        return true;
    }

    public function rules(): array
    {
        return [
            'student_name'     => ['required', 'string', 'max:255'],
            'age'      => ['required', 'integer'],
            'gender' => ['required', 'string', 'in:Male,Female,Other'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
