<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'sometimes',
                'string',
                'max:255',
            ],
            'description' => [
                'nullable',
                'string',
                'max:5000',
            ],
            'startDate' => [
                'nullable',
                'date_format:Y-m-d',
            ],
            'dueDate' => [
                'nullable',
                'date_format:Y-m-d',
            ],
        ];
    }
}
