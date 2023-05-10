<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        return [
            //
            'name' => 'required|min:4|max:40|unique:books',
            // 'course' => 'required|min:3|max:8',
            'course_id' => 'required|exists:courses,id',
            'price' => 'required|numeric|gt:50',
            'stock' => 'required|numeric|gt:1',
            'minStock' => 'required|numeric|gt:0'
        ];
    }
}
