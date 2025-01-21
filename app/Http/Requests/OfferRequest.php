<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('messages.name required'),
            'name.unique' => __('messages.name unique'),
            'name.max' => __('messages.name max'),
            'price.required' => __('messages.price required'),
            'price.numeric' => __('messages.price required'),
            'details.required' => __('messages.details required'),
         ];
    }
}
