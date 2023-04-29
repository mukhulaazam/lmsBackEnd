<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\JsonResponse;
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
            $tags = Tags::get();

            return response()->json([
                'message' => 'Tags fetched successfully',
                'data' => $tags
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tags $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagsRequest $request, Tags $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tags $tags)
    {
        //
    }
}
