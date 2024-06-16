<?php

namespace App\Policies;

use App\Models\ProjectMember;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TicketPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, $projectId): bool
    {
        if ($user->role === 'ADMIN') {
            return true;
        }

        $isInProject = ProjectMember::where('user_id', $user->id)
            ->where('project_id', $projectId)
            ->exists();

        return $isInProject;
    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, Ticket $ticket): bool
    // {
    //     return $user->id === $ticket->created_by || $user->id === $ticket->assigned_to || $this->isInProject($user, $ticket->project_id);
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ticket $ticket): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ticket $ticket): bool
    {
        return true;
    }
}
