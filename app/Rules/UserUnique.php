<?php

namespace App\Rules;

use App\Models\ProjectMember;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class UserUnique implements ValidationRule
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user =  !ProjectMember::where('project_id', $this->projectId)
            ->where('user_id', $value)
            ->exists();

        if (!$user) {
            $fail('The user is already a member of this project.');
        }
    }
}
