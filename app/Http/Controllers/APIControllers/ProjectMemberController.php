<?php

namespace App\Http\Controllers\APIControllers;

use App\Exceptions\CustomQueryException;
use App\Models\ProjectMember;
use App\Http\Requests\StoreProjectMemberRequest;
use App\Http\Requests\UpdateProjectMemberRequest;
use App\Http\Resources\ProjectMemberResource;
use App\Mail\AddedProjectNotification;
use App\Mail\ProjectMemberRemovedNotification;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Repositories\ProjectMemberRepository;

class ProjectMemberController extends Controller
{
    protected $repository;

    public function __construct(ProjectMemberRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $projectId)
    {
        $sizePage = $request->size_page ?? 10;

        // Lấy danh sách thành viên trong dự án này
        $members = ProjectMember::where('project_id', $projectId)->paginate($sizePage);

        // Trả về danh sách thành viên dưới dạng JSON
        return ProjectMemberResource::collection($members);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectMemberRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $this->repository->addMembersToProject($project, $validatedData);

        return new JsonResponse([
            'message' => 'Members added successfully.'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Project $project)
    {
        $pageSize = $request->page_size ?? 10;
        $members = $project->projectMembers()->with('user')->paginate($pageSize);

        return ProjectMemberResource::collection($members);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectMemberRequest $request, Project $project)
    {
        $validatedData = $request->validated();
        $membersData = $validatedData['members'];

        $this->repository->updateMembersInProject($project, $membersData);

        return new JsonResponse([
            'message' => 'Project members updated successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, ProjectMember $projectMember)
    {
        $user = User::findOrFail($projectMember->user_id);

        $deleted = $projectMember->delete();

        throw_if(!$deleted, CustomQueryException::class, 'Error occurred while deleting the member.');

        Mail::to($user->email)->queue(new ProjectMemberRemovedNotification($user->name, $project->name));

        return new JsonResponse([
            'message' => 'delete member success'
        ], 204);
    }
}
