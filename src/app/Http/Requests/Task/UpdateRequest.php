<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [];
    }
}
