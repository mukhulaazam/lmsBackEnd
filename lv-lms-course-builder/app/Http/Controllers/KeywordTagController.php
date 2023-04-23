<?php

namespace App\Http\Controllers;

use App\Models\KeywordTag;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\{StoreKeywordTagRequest, UpdateKeywordTagRequest};

class KeywordTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreKeywordTagRequest $request) : JsonResponse
    {
        try {
            $tag = new KeywordTag;
            $tag->title = $request->title;
            $tag->slug = Str::slug($request->title);
            $tag->description = $request->description;
            $tag->save();

            return response()->json([
                'data' => $tag,
                'message' => 'Keyword tag create successfull',
            ], JsonResponse::HTTP_CREATED);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KeywordTag $keywordTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KeywordTag $keywordTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeywordTagRequest $request, KeywordTag $keywordTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KeywordTag $keywordTag)
    {
        //
    }
}
