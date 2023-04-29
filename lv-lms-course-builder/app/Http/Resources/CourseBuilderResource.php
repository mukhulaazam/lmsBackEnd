<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseBuilderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'kyc' => $this->kyc,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'tag_id' => $this->tag_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'des' => $this->des,
            'phone_no' => $this->phone_no,
            'duration' => $this->duration,
            'price' => $this->price,
            'discount' => $this->discount,
            'discounted_price' => $this->discounted_price,
            'is_featured' => $this->is_featured,
            'is_free' => $this->is_free,
            'is_archive' => $this->is_archive,
            'banner_image' => $this->banner_image,
            'type' => $this->type,
            'status' => $this->status,

            'sections' => $this->sections->map(function ($section) {
                return [
                    'id' => $section->id,
                    'course_id' => $section->course_id,
                    'title' => $section->title,
                    'description' => $section->description,
                    'is_free' => $section->is_free,
                    'is_preview' => $section->is_preview,
                    'is_published' => $section->is_published,
                    'order' => $section->order,
                    'is_custom_ordering' => $section->is_custom_ordering,
                ];
            }),
            'category' => $this->category,
        ];
    }
}
