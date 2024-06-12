<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomQueryException;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $pageSize = $request->page_size ?? 10;

        $projects = Project::where('admin_id', $user->id)->paginate($pageSize);

        throw_if($projects->isEmpty(), CustomQueryException::class, 'No projects found for this admin.');

        return ProjectResource::collection($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validatedData = $request->validated();

        $validatedData['admin_id'] = $user->id;

        $project = Project::create($validatedData);

        throw_if(!$project, CustomQueryException::class, 'Error occurred while creating the project.');

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $user = JWTAuth::parseToken()->authenticate();

        throw_if($project->admin_id !== $user->id, CustomQueryException::class, 'You do not have permission to read.');

        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        $updated = $project->update($validatedData);

        throw_if(!$updated, CustomQueryException::class, 'Error occurred while updating the project.');

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $user = JWTAuth::parseToken()->authenticate();

        throw_if($project->admin_id !== $user->id, CustomQueryException::class, 'You do not have permission to delete this project.');

        $deleted = $project->delete();

        throw_if(!$deleted, CustomQueryException::class, 'Error occurred while deleting the project.');

        return new JsonResponse([
            'message' => 'delete success'
        ], 204);
    }
}
