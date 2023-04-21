<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CourseBuilder;
use App\Http\Requests\{StoreCourseBulderRequest, UpdateCourseBulderRequest};


class CourseBulderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseBulderRequest $request)
    {
        try {
            $course = CourseBuilder::create($request->validated(),[
                'slug' => Str::slug($request->title),
            ]);
            return response()->json([
                "message" => "Course created successfully",
                "data" => $course
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseBulderRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
