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
            'name_en'=>'required|max:100|unique:offers,name_en',
            'name_ar'=>'required|max:100|unique:offers,name_ar',
            'price'=>'required|numeric',
            'details_en'=> 'required',
            'details_ar'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_en.required' => __('messages.name_en required'),
            'name_en.unique' => __('messages.name_en unique'),
            'name_en.max' => __('messages.name_en max'),
            'name_ar.required' => __('messages.name_ar required'),
            'name_ar.unique' => __('messages.name_ar unique'),
            'name_ar.max' => __('messages.name_ar max'),
            'price.required' => __('messages.price required'),
            'price.numeric' => __('messages.price required'),
            'details_en.required' => __('messages.details_en required'),
            'details_ar.required' => __('messages.details_ar required'),
         ];
    }
}
