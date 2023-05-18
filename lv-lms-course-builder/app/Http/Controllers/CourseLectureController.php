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
            if($file) {            
                $res = $courseLectureService->sendFileToNodeServer((object) $request->all());
                if ($res) {
                    $request->merge(['videoThumbnail' => $res['fileName']]);

                    $courseLecture = $courseLectureService->store((object) $request->all());

                    return response()->json([
                        'message'   => 'Course lecture created successfully',
                        'data'      => $courseLecture,
                    ], JsonResponse::HTTP_CREATED);
                }

                return response()->json([
                    'message'   => 'Course lecture created failed',
                ], JsonResponse::HTTP_BAD_REQUEST);
            }
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
