<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePostRequest extends FormRequest
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
                'unique:App\Models\User,mobile,' . auth()->id(),
                'ir_mobile:zero'
            ],
            'email' => [
                'email',
                'required',
                'unique:App\Models\User,email,' . auth()->id(),
                'max:100'

            ],
            'password' => [
                'nullable',
                'min:6',

            ],
        ];
    }
}
