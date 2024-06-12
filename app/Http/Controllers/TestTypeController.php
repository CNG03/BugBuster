<?php

namespace App\Http\Controllers;

use App\Models\TestType;
use App\Http\Requests\StoreTestTypeRequest;
use App\Http\Requests\UpdateTestTypeRequest;
use App\Http\Resources\TestTypeResource;
use Illuminate\Http\JsonResponse;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testTypes = TestType::query()->get();

        return TestTypeResource::collection($testTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTestTypeRequest $request)
    {
        $testType = TestType::create($request->only('name'));

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
        $testType->update($request->only(['name']));

        return new TestTypeResource($testType);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestType $testType)
    {
        $testType->delete();

        return new JsonResponse([
            'message' => 'delete document success'
        ], 204);
    }
}
