<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\BugType;
use App\Http\Requests\StoreBugTypeRequest;
use App\Http\Requests\UpdateBugTypeRequest;
use App\Http\Resources\BugTypeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class BugTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sizePage = $request->size_page ?? 10;

        $bugTypes = BugType::query()->paginate($sizePage);

        return BugTypeResource::collection($bugTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBugTypeRequest $request)
    {
        $this->authorize('create', BugType::class);

        $validatedData = $request->validated();

        $bugType = BugType::create($validatedData);

        return new JsonResponse($bugType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BugType $bugType)
    {
        return new BugTypeResource($bugType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBugTypeRequest $request, BugType $bugType)
    {
        $this->authorize('update', $bugType);

        $validatedData = $request->validated();

        $bugType->update($validatedData);

        return new BugTypeResource($bugType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BugType $bugType)
    {
        $this->authorize('delete', $bugType);

        $bugType->delete();

        return new JsonResponse([
            'message' => 'delete document success'
        ], 204);
    }
}
