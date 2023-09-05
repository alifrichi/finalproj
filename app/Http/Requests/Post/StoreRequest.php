<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // dont' forget to set this as true
        return true;
    }
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:250',
            'content' => 'required|string|min:3|max:6000',
            'featured_image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
            'genre' => 'required',
            'category' => 'required',
            'price_per_month' => 'required|numeric|min:0', // Validation for price_per_month
            'price_per_week' => 'required|numeric|min:0', // Validation for price_per_week
        ];
    }

}
