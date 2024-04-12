<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [];
    }
}
