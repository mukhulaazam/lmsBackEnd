<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\{Str,Carbon};
use App\Http\Requests\{StoreCategoryRequest,UpdateCategoryRequest};

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = 1;
        $categories = Category::where('is_active',$active)->latest()->get();

        return response()->json([
            'message' => 'Category list',
            'data' => $categories
        ], JsonResponse::HTTP_OK);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request) : JsonResponse
    {
        try {
            $category = new Category;
            $category->title = $request->title;
            $category->slug = Str::slug($request->title);
            $category->save();

            return response()->json([
                'message' => 'Category created successfully',
                'data' => $category
            ], JsonResponse::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();

        return response()->json([
            'message' => 'Category details',
            'data' => $category
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $slug) : JsonResponse
    {
        try {
            $category = Category::where('slug',$slug)->firstOrFail();
            $category->title = $request->title;
            $category->slug = Str::slug($request->title);
            $category->save();

            return response()->json([
                'message' => 'Category updated successfully',
                'data' => $category
            ], JsonResponse::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
