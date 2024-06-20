<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Repositories\ProjectRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProjectController extends Controller
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Project::class);

        $user = JWTAuth::parseToken()->authenticate();

        $pageSize = $request->page_size ?? 10;

        $projects = $this->repository->getProjects($user, $pageSize);

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $user = JWTAuth::parseToken()->authenticate();

        $validatedData = $request->validated();

        $validatedData['admin_id'] = $user->id;

        $project = $this->repository->createProject($validatedData);

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $this->authorize('view', $project);


        $project = Project::with('admin', 'projectMembers')->findOrFail($project->id);

        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $validatedData = $request->validated();

        $this->repository->updateProject($project, $validatedData);

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $this->repository->deleteProject($project);

        return new JsonResponse([
            'message' => 'delete success'
        ], 204);
    }
}
