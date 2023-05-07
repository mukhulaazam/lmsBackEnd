<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseLectureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'course_builder_id' => ['required', 'integer', 'exists:course_builders,id'],
            'section_id' => ['required', 'integer', 'exists:sections,id'],
            'description' => ['nullable', 'string'],
            'video_url' => ['required', 'string'],
            'video_duration' => ['required', 'integer'],
            'video_thumbnail' => ['required', 'string'],
        ];
    }

/**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Title is required',
            'course_builder_id.required' => 'Course builder id is required',
            'section_id.required' => 'Section id is required',
            'video_url.required' => 'Video url is required',
            'video_duration.required' => 'Video duration is required',
            'video_thumbnail.required' => 'Video thumbnail is required',
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ],422));
    }
}
