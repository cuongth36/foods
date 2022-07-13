<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:products',
            'category_id' => 'required',
            'thumbnail'  => 'image|mimes:jpeg,png,jpg,gif',
            'price' => 'required|regex:/^[0-9]+$/',
            'description' => 'nullable|max:255',
            'amount' => 'required|integer|min:1',
            'discount' => 'nullable|integer|min:1|max:100'
        ];
    }
}
