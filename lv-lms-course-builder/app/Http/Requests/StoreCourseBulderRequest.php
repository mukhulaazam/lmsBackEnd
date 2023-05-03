<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            "category_id" => "required|integer:exists:categories,id",
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
            "sections" => "required|array",
            "sections.*.title" => "required|string|unique:sections,title",
        ];
    }

    public function messages():array
    {
        return [
            "tag_id.required" => "Tag is required",
            "tag_id.integer" => "Tag must be an integer",
            "user_id.required" => "User is required",
            "user_id.integer" => "User must be an integer",
            "category_id.required" => "Category is required",
            "category_id.integer" => "Category must be an integer",
            "title.required" => "Title is required",
            "title.string" => "Title must be a string",
            "des.required" => "Description is required",
            "des.string" => "Description must be a string",
            "phone_no.required" => "Phone number is required",
            "phone_no.string" => "Phone number must be a string",
            "duration.required" => "Duration is required",
            "duration.integer" => "Duration must be an integer",
            "price.required" => "Price is required",
            "price.numeric" => "Price must be a number",
            "discount.required" => "Discount is required",
            "discount.numeric" => "Discount must be a number",
            "discounted_price.required" => "Discounted price is required",
            "discounted_price.numeric" => "Discounted price must be a number",
            "is_featured.required" => "Is featured is required",
            "is_featured.boolean" => "Is featured must be a boolean",
            "is_free.required" => "Is free is required",
            "is_free.boolean" => "Is free must be a boolean",
            "is_archive.required" => "Is archive is required",
            "is_archive.boolean" => "Is archive must be a boolean",
            "banner_image.required" => "Banner image is required",
            "banner_image.string" => "Banner image must be a string",
            "type.required" => "Type is required",
            "type.integer" => "Type must be an integer",
            "sections.*.title.required" => "Section title is required",
            "sections.*.title.string" => "Section title must be a string",
            "sections.*.title.distinct" => "Section title must be unique",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ],422));
    }
}
