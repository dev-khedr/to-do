<?php

namespace App\Http\Requests\TaskList;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ];
    }
}
