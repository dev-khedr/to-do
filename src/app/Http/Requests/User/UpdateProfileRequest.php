<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'sometimes',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,'.auth()->user()->getAuthIdentifier(),
            ],
        ];
    }
}
