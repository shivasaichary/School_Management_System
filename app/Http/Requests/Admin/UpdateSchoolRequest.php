<?php

namespace App\Http\Requests\Admin;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Gate;

class UpdateSchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('school.update');
        // return true;
    }

    public function rules(): array
    {
        return [
            'school_name' => ['required', 'string', 'max:255'],
            'city_id' => ['required', 'numeric', 'exists:cities,id'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }
}
