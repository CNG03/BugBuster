<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
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
        return [
            'project_id' => 'required|integer|exists:projects,id',
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'estimated_hours' => 'sometimes|date_format:Y-m-d',
            'illustration' => 'sometimes|image|max:2048',
            'steps_to_reproduce' => 'sometimes|string',
            'expected_result' => 'sometimes|string',
            'actual_result' => 'sometimes|string',
            'priority' => 'sometimes|in:HIGH,MEDIUM,LOW',
            'bug_type_id' => 'sometimes|integer|exists:bug_types,id',
            'test_type_id' => 'sometimes|integer|exists:test_types,id',
        ];
    }
}
