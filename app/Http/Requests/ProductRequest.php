<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use App\Models\Category;

class ProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:10',
            'price' => 'required|integer|min:10|max:1000',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id'
        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {

            if ($validator->errors()->any()) {
                return;
            }

            $category = Category::find($this->category_id);

            if (!$category) {
                return;
            }

            $min = $category->min_price;
            $max = $category->max_price;

            if ($this->price < $min || $this->price > $max) {
                $validator->errors()->add(
                    'price',
                    "Price must be between {$min} and {$max} for this category."
                );
            }

        });
    }
}
