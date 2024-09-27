<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class GoogleLoginRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'idToken' => [
                'required',
                'string',
            ],
        ];
    }
}
