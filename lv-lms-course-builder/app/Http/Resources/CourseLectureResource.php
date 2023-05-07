<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseLectureResource extends JsonResource
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
            'section_id' => $this->section_id,
            'title' => $this->title,
            'description' => $this->description,
            'is_free' => $this->is_free,
            'is_preview' => $this->is_preview,
            'is_published' => $this->is_published,
            'order' => $this->order,
            'is_custom_ordering' => $this->is_custom_ordering,
            'video_url' => $this->video_url,
            'video_type' => $this->video_type,
            'video_duration' => $this->video_duration,
            'video_thumbnail' => $this->video_thumbnail,
        ];
    }
}
