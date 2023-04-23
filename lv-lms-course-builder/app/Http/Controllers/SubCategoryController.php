<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\{Str,Carbon};
use App\Http\Resources\SubCategoryResource;
use App\Http\Requests\{StoreSubCategoryRequest,UpdateSubCategoryRequest};

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        try {
            $subCategories = SubCategory::with('category')->get();
            return response()->json([
                'message' => 'Sub Categories fetched successfully',
                'data' => SubCategoryResource::collection($subCategories)
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request) : JsonResponse
    {
        try {
            $subCategory = new SubCategory;
            $subCategory->title = $request->title;
            $subCategory->slug = Str::slug($request->title);
            $subCategory->category_id = $request->category_id;
            $subCategory->save();

            return response()->json([
                'message' => 'Sub Category created successfully',
                'data' => $subCategory
            ], JsonResponse::HTTP_CREATED);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $slug) : JsonResponse
    {
        try {
            $subCategory = SubCategory::where('slug', $slug)->with('category')->first();
            return response()->json([
                'message' => 'Sub Category fetched successfully',
                'data' => new SubCategoryResource($subCategory)
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubCategoryRequest $request, string $slug) : JsonResponse
    {
        try {
            $subCategory = SubCategory::where('slug', $slug)->first();
            $subCategory->title = $request->title;
            $subCategory->slug = Str::slug($request->title);
            $subCategory->category_id = $request->category_id;
            $subCategory->save();

            return response()->json([
                'message' => 'Sub Category updated successfully',
                'data' => $subCategory
            ], JsonResponse::HTTP_OK);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
