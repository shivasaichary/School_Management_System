<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateClsRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return Gate::allows('cls.update');
        return true;
    }

    public function rules(): array
    {
        return [
            'class_name' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'starting_time' => ['required', 'date_format:H:i'],
            'ending_time' => ['required', 'date_format:H:i'],
            'teacher_name'=>['required','string','max:255'],
            'section' => ['required', 'string', 'in:A,B,C,D'],
        ];
    }
}
