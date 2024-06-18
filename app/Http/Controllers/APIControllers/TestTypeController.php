<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\TestType;
use App\Http\Requests\StoreTestTypeRequest;
use App\Http\Requests\UpdateTestTypeRequest;
use App\Http\Resources\TestTypeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $pageSize = $request->page_size ?? 10;

        $testTypes = TestType::query()->paginate($pageSize);

        return TestTypeResource::collection($testTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestTypeRequest $request)
    {
        $this->authorize('create', TestType::class);
        $validateData = $request->validated();
        $testType = TestType::create($validateData);

        return new JsonResponse($testType, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TestType $testType)
    {
        return new TestTypeResource($testType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestTypeRequest $request, TestType $testType)
    {
        $this->authorize('update', $testType);
        $validateData = $request->validated();
        $testType->update($validateData);

        return new TestTypeResource($testType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestType $testType)
    {
        $this->authorize('delete', $testType);

        $testType->delete();

        return new JsonResponse([
            'message' => 'delete document success'
        ], 204);
    }
}
