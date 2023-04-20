<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseBulderRequest extends FormRequest
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
            "tag_id" => "required|integer",
            "user_id" => "required|integer",
            "category_id" => "required|integer",
            "title" => "required|string",
            "des" => "required|string",
            "phone_no" => "required|string",
            "duration" => "required|integer",
            "price" => "required|numeric",
            "discount" => "required|numeric",
            "discounted_price" => "required|numeric",
            "is_featured" => "required|boolean",
            "is_free" => "required|boolean",
            "is_archive" => "required|boolean",
            "banner_image" => "required|string",
            "type" => "required|integer",
            "slug" => "required|string",
            "status" => "required|boolean",

        ];
    }
}
