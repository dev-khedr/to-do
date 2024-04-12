<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilePasswordRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
            ],
        ];
    }
}
