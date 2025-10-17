<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
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
            //
            'first_name' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ],
            'last_name' => [
                'required',
                'string',
                'min:2',
                'max:100'
            ],
            'mobile' => [
                'required',
                'unique:App\Models\User',
                'ir_mobile:zero'
            ],
            'email' => [
                'email',
                'required',
                'unique:App\Models\User',
                'max:100'

            ],
            'password' => [
                'required',
                'confirmed',
                'min:6',

            ],
        ];
    }
}
