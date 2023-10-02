<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class StoreResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $oneYearAgo = Carbon::now()->subYear();

        return [
            'subject_name' => ['required', 'string', 'in:telugu,hindi,english,maths,science,social,computers,yoga,games'],
            'marks_obtained' => ['required', 'numeric', 'between:90,100'],
            'date_of_exam' => ['required', 'date', 'before_or_equal:' . $oneYearAgo],
        ];
    }
}
