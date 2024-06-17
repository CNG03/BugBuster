<?php

namespace App\Repositories;

use App\Exceptions\CustomQueryException;
use App\Models\ProjectMember;
use App\Models\User;
use App\Models\Project;

class ProjectRepository
{
    public function getProjects(User $user, $pageSize)
    {
        if ($user->role === 'ADMIN')
            return Project::where('admin_id', $user->id)->paginate($pageSize);

        else if ($user->role === 'USER') {
            $memberProjects = ProjectMember::where('user_id', $user->id)->pluck('project_id');
            return Project::whereIn('id', $memberProjects)->paginate($pageSize);
        }
    }


    public function createProject(array $data)
    {
        $project = Project::create($data);

        throw_if(!$project, CustomQueryException::class, 'Error occurred while creating the project.');

        return $project;
    }

    public function updateProject(Project $project, array $data)
    {
        $updated = $project->update($data);

        throw_if(!$updated, CustomQueryException::class, 'Error occurred while updating the project.');
    }

    public function deleteProject(Project $project)
    {
        $deleted = $project->delete();

        throw_if(!$deleted, CustomQueryException::class, 'Error occurred while deleting the project.');
    }
}
