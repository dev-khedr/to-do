<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:admins,email,'.$this->route()->originalParameter('id'),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
            ],
        ];
    }
}
