<?php

namespace App\Http\Controllers;

use App\Models\CourseLecture;
use Illuminate\Http\JsonResponse;
use App\Services\CourseLectureService;
use App\Http\Requests\{StoreCourseLectureRequest, UpdateCourseLectureRequest};

class CourseLectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $lectures = CourseLecture::all();

        return response()->json([
            'message'   => 'Course lectures fetched successfully',
            'data'      => $lectures,
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseLectureRequest $request, CourseLectureService $courseLectureService) : JsonResponse
    {
        try {
            $file = $request->file('video_thumbnail');
            // dd($file);
            if($file) {
                // send the file to node ftp server localhost:5000/api/v1/files/single?folder_name=test
                $response = $courseLectureService->sendFileToNodeServer((object) $request->all());

                return response()->json([
                    'message'   => 'Lecture Video uploaded successfully',
                    'data'      => $response,
                ], JsonResponse::HTTP_CREATED);

                $request->merge([
                    'video_thumbnail' => $response->data->file_path,
                ]);
            }
            $courseLecture = $courseLectureService->store((object) $request->all());

            return response()->json([
                'message'   => 'Course lecture created successfully',
                'data'      => $courseLecture,
            ], JsonResponse::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseLecture $courseLecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseLectureRequest $request, CourseLectureService $courseLectureService, integer $id): JsonResponse
    {
        try {
            $courseLecture = $courseLectureService->update((object) $request->all(), $id);

            return response()->json([
                'message'   => 'Course lecture updated successfully',
                'data'      => $courseLecture,
            ], JsonResponse::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseLecture $courseLecture)
    {
        //
    }
}
