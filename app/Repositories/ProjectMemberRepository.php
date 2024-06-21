<?php

namespace App\Repositories;

use App\Events\AddedProject;
use App\Events\RoleChanged;
use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddedProjectNotification;
use App\Mail\RoleChangedNotification;

class ProjectMemberRepository
{
    /**
     * phương thức thêm các thành viên vào project
     */
    public function addMembersToProject($project, $validatedData)
    {
        $userIds = collect($validatedData['members'])->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        DB::transaction(function () use ($validatedData, $project, $users) {
            foreach ($validatedData['members'] as $member) {
                ProjectMember::create([
                    'project_id' => $project->id,
                    'user_id' => $member['user_id'],
                    'role_in_project' => $member['role_in_project'],
                ]);

                $user = $users[$member['user_id']];

                AddedProject::dispatch($user, $project);
            }
        });
    }

    /**
     * phương thức cập nhật lại role các thành viên trong project
     */
    public function updateMembersInProject($project, $membersData)
    {
        DB::transaction(function () use ($project, $membersData) {
            $userIds = collect($membersData)->pluck('user_id');
            $users = User::whereIn('id', $userIds)->get()->keyBy('id');

            $membersToUpdate = [];

            foreach ($membersData as $member) {
                $user = $users->get($member['user_id']);

                $projectMember = ProjectMember::where('project_id', $project->id)
                    ->where('user_id', $member['user_id'])
                    ->firstOrFail();

                if ($projectMember->role_in_project !== $member['role_in_project']) {
                    $projectMember->update([
                        'role_in_project' => $member['role_in_project'],
                    ]);
                    $membersToUpdate[] = $user;
                }
            }

            foreach ($membersToUpdate as $user) {
                RoleChanged::dispatch($user, $project, $member['role_in_project']);
            }
        });
    }
}
