<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // basic validation rules not involving database queries
        return [
            'name' => 'required|min:4|max:20',
            'roll_no' => 'required|min:2|max:8|unique:students,roll_no',
            'course' => 'required|numeric|exists:courses,id',
            'books' => 'required|array',
            'books.*' => 'numeric|exists:books,id'
        ];
    }
}
