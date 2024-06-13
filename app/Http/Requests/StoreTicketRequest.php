<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'created_by' => 'required|integer|exists:users,id',
            'assigned_to' => 'nullable|integer|exists:users,id',
            'estimated_hours' => 'nullable|date', // Kiểm tra xem estimated_hours có phải là kiểu date không
            'is_outdate' => 'boolean', // Kiểm tra xem is_outdate có phải là kiểu boolean không
            'steps_to_reproduce' => 'nullable|string',
            'expected_result' => 'nullable|string',
            'actual_result' => 'nullable|string',
            'priority' => 'required|in:HIGH,MEDIUM,LOW',
            'bug_type_id' => 'nullable|integer|exists:bug_types,id',
            'test_type_id' => 'nullable|integer|exists:test_types,id',
        ];
    }
}
