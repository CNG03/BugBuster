<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Log;

class ProjectPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Project $project): bool
    {
        Log::info('Policy view check', ['user_id' => $user->id, 'project_id' => $project->id]);
        return $user->role === 'ADMIN' || $project->isAdmin($user) || $project->isMember($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'ADMIN';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Project $project): bool
    {
        return $user->role === 'ADMIN' && $user->id === $project->admin_id;
    }

    public function complete(User $user, Project $project)
    {
        return $user->role === 'ADMIN' || $project->isManager($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Project $project): bool
    {
        return $user->role === 'ADMIN' && $user->id === $project->admin_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Project $project)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  */
    // public function forceDelete(User $user, Project $project)
    // {
    //     //
    // }
}
