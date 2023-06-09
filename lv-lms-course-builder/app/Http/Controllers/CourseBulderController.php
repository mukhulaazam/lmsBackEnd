<?php

namespace App\Http\Controllers;

use App\Models\CourseBuilder;
use Illuminate\Http\JsonResponse;
use App\Services\CourseBuilderService;
use App\Http\Resources\CourseBuilderResource;
use App\Http\Requests\{StoreCourseBulderRequest, UpdateCourseBulderRequest};

class CourseBulderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $course = CourseBuilder::with(['category.subCategory','sections.lectures'])->where('user_id',request()->userId)->latest()->get();

        return response()->json([
            "message" => "Course list",
            "data" => CourseBuilderResource::collection($course)
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseBulderRequest $request, CourseBuilderService $courseService):JsonResponse
    {
        try {
            $course = $courseService->store((object) $request->all());

            return response()->json([
                "message" => "Course created successfully",
                "data" => $course
            ], JsonResponse::HTTP_CREATED);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = CourseBuilder::where('kyc',$id)->firstOrFail();

        return response()->json([
            "message" => "Course details",
            "data" => new CourseBuilderResource($course)
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseBulderRequest $request,CourseBuilderService $courseService, string $id) : JsonResponse
    {
        try {
            $course = $courseService->update((object) $request->all(), $id);

            return response()->json([
                "message" => "Course updated successfully",
                "data" => new CourseBuilderResource($course)
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
