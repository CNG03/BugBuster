<?php

namespace App\Http\Requests;

use App\Rules\UserUnique;
use Illuminate\Foundation\Http\FormRequest;

class StoreProjectMemberRequest extends FormRequest
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
        $project = $this->route('project');

        return [
            'members' => 'required|array',
            'members.*.user_id' => [
                'required',
                'exists:users,id',
                new UserUnique($project->id)
            ],
            'members.*.role_in_project' => 'required|in:MANAGER,DEVELOPER,TESTER,READER',
        ];
    }
}
