<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'page' => [
                'nullable',
                'integer',
                'min:1',
            ],
            'perPage' => [
                'nullable',
                'integer',
                'min:1',
            ],
        ];
    }
}
