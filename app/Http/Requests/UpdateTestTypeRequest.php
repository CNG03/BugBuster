<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTestTypeRequest extends FormRequest
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
        $testTypeId = $this->route('testType') ? $this->route('testType')->id : null;

        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('test_types')->where(function ($query) use ($testTypeId) {
                    return $query->where('id', '<>', $testTypeId);
                }),
            ],
            'description' => 'nullable|string'
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'The name require unique'
        ];
    }
}
