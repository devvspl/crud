<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string',
            'description' => 'required|string:min:3|max:255',

        ];
    }
    public function messages(): array
    {
        return [
            'product_name.required' => 'Product name is required',
            'description.required' => 'Description is required',
            'description.min' => 'Description must be at least 3 characters',
            'description.max' => 'Description may not be greater than 255 characters',
        ];
    }
}
