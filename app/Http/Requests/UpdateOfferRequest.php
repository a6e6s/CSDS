<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfferRequest extends FormRequest
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

            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'end_at' => 'nullable',
            'start_at' => 'nullable',
            'title' => 'required',
            'body' => 'required',
            'price' => 'required',
            'new_price' => 'required',
            'hospital_id' => 'required',
            'status' => 'required',
            'end_at' => '',
            'start_at' => '',
        ];
    }
}
