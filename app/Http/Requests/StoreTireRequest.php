<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTireRequest extends FormRequest
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
            'profile' => 'required|string|max:255',
            'width' => 'required|numeric',
            'rim_diameter' => 'required|numeric',
            'description' => 'required|string|max:1000',
            'quantity' => 'required|integer',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'acquisition_date' => 'required',
            'brand_id' => 'required|integer|exists:brands,id',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id',
            'status' => 'required|string|max:255'
        ];
    }
}
