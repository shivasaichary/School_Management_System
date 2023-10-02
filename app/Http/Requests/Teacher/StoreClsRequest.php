<?php

namespace App\Http\Requests\Teacher; // Update the namespace to match your project structure

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreClsRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return Gate::allows('cls.create');
        return true;
    }

    public function rules(): array
    {
        return [
            'class_name' => ['required', 'string', 'max:255', 'in:First,Second,Third,FOurth,Fifth,Sixth,Seventh,Eighth,Ninth,Tenth'],
            'subject' => ['required', 'string', 'max:255'],
            'starting_time' => ['required', 'date_format:H:i'],
            'ending_time' => ['required', 'date_format:H:i'],
            'teacher_name'=>['required','string','max:255'],
            'section' => ['required', 'string', 'in:A,B,C,D'],
        ];
    }

}
