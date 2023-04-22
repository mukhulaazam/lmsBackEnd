<?php
namespace App\Services;

use App\Models\CourseBuilder;
use Illuminate\Support\{Str,Carbon};

class CourseBuilderService
{
    public function store($data): CourseBuilder
    {
        try {
            $course = new CourseBuilder;
            $course->tag_id = $data->tag_id;
            $course->kyc = now()->format('Y') . Str::random(13) . time(). now()->format('m');
            $course->user_id = $data->user_id;
            $course->category_id = $data->category_id;
            $course->title = $data->title;
            $course->slug = Str::slug($data->title);
            $course->des = $data->des;
            $course->phone_no = $data->phone_no;
            $course->duration = $data->duration;
            $course->price = $data->price;
            $course->discount = $data->discount;
            $course->discounted_price = $data->discounted_price;
            $course->is_featured = $data->is_featured;
            $course->is_free = $data->is_free;
            $course->is_archive = $data->is_archive;
            $course->banner_image = $data->banner_image;
            $course->type = $data->type;
            $course->status = config('status.courseBuilder.submitted');
            $course->save();
            return $course;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($data, string $id): CourseBuilder
    {
        try {
            $course = CourseBuilder::where('kyc',$id)->firstOrFail();

            $course->tag_id = $data->tag_id;
            $course->category_id = $data->category_id;
            $course->title = $data->title;
            $course->slug = Str::slug($data->title);
            $course->des = $data->des;
            $course->phone_no = $data->phone_no;
            $course->duration = $data->duration;
            $course->price = $data->price;
            $course->discount = $data->discount;
            $course->discounted_price = $data->discounted_price;
            $course->is_featured = $data->is_featured;
            $course->is_free = $data->is_free;
            $course->is_archive = $data->is_archive;
            $course->banner_image = $data->banner_image;
            $course->type = $data->type;
            $course->status = config('status.courseBuilder.submitted');
            $course->save();
            
            return $course;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}