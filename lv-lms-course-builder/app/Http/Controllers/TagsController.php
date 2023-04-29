<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\TagsResource;
use Illuminate\Support\{Str,Carbon};
use App\Http\Requests\{StoreTagsRequest,UpdateTagsRequest};


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tags = Tags::latest()->get();

            return response()->json([
                'message' => 'Tags fetched successfully',
                'data' => TagsResource::collection($tags)
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagsRequest $request)
    {
        try {
            $tag = new Tags;
            $tag->title = $request->title;
            $tag->slug = Str::slug($request->title);
            $tag->description = $request->description;
            $tag->save();

            return response()->json([
                'message' => 'Tag created successfully',
                'data' => $tag
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        try {
            $tag = Tags::where('slug', $slug)->first();

            return response()->json([
                'message' => 'Tag fetched successfully',
                'data' => $tag
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, $slug)
    {
        try {
            $tag = Tags::where('slug', $slug)->first();
            $tag->title = $request->title;
            $tag->slug = Str::slug($request->title);
            $tag->description = $request->description;
            $tag->save();

            return response()->json([
                'message' => 'Tag updated successfully',
                'data' => $tag
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tags)
    {
        //
    }
}
