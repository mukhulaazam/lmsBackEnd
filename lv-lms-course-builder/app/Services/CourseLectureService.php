<?php

namespace App\Services;

use App\Models\CourseLecture;
use Illuminate\Support\{Str,Carbon};
use Illuminate\Support\Facades\{DB,Http};

class CourseLectureService
{
    public function store($data): CourseLecture
    {
        try {
            DB::beginTransaction();

            $lecture = new CourseLecture;

            $lecture->title = $data->title;
            $lecture->slug = Str::slug($data->title);
            $lecture->course_builder_id = $data->course_builder_id;
            $lecture->section_id = $data->section_id;
            $lecture->des = $data->des;
            $lecture->video_url = $data->video_url;
            $lecture->video_duration = $data->video_duration;
            $lecture->video_thumbnail = $data->video_thumbnail;
            $lecture->is_free = $data->is_free ?? false;
            $lecture->is_published = $data->is_published ?? false;
            $lecture->is_preview = $data->is_preview ?? false;
            $lecture->sort_order = $data->sort_order ?? 0;
            $lecture->view_count = $data->view_count ?? 0;
            $lecture->like_count = $data->like_count ?? 0;
            $lecture->dislike_count = $data->dislike_count ?? 0;
            $lecture->comment_id = $data->comment_id ?? 0;

            $lecture->save();

            DB::commit();
            return $lecture;
        
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($data, integer $id): CourseLecture
    {
        try {
            DB::beginTransaction();
            $lecture = CourseLecture::findOrFail($id);
            
            $lecture->title = $data->title;
            $lecture->slug = Str::slug($data->title);
            $lecture->course_builder_id = $data->course_builder_id;
            $lecture->section_id = $data->section_id;
            $lecture->des = $data->des;
            $lecture->video_url = $data->video_url;
            $lecture->video_duration = $data->video_duration;
            $lecture->video_thumbnail = $data->video_thumbnail;
            $lecture->is_free = $data->is_free ?? false;
            $lecture->is_published = $data->is_published ?? false;
            $lecture->is_preview = $data->is_preview ?? false;
            $lecture->sort_order = $data->sort_order ?? 0;
            $lecture->view_count = $data->view_count ?? 0;
            $lecture->like_count = $data->like_count ?? 0;
            $lecture->dislike_count = $data->dislike_count ?? 0;
            $lecture->comment_id = $data->comment_id ?? 0;

            $lecture->save();

            DB::commit();
            return $lecture;
        
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sendFileToNodeServer($data)
    {
        try {
            $file = $data->video_thumbnail;
            $apiEndPoint = 'http://127.0.0.1:5000/api/v1/files/single?folderName=courseLecture';
            // return $res;
            // upload file to node server 
            $client = new \GuzzleHttp\Client();
            $res = $client->request('POST', $apiEndPoint,
                [
                    'multipart' => [
                        [
                            'name' => 'file',
                            'contents' => fopen($file, 'r'),
                            'filename' => basename($file)
                        ]
                    ]
                ]);
            $res = json_decode($res->getBody()->getContents());


            return $res;
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}