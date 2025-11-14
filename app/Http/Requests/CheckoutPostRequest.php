<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutPostRequest extends FormRequest
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

            'user_province' => 'required|string|max:50',
            'user_city' => 'required|string|max:50',
            'user_address' => 'required|string|max:150',
            'user_mobile' => 'required|ir_mobile',
            'user_postal_code' => 'required|digits:10',
            'description' => 'nullable|string|max:500',

        ];
    }
}
