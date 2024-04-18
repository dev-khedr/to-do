<?php

use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

if (! function_exists('empty_validator')) {
    function empty_validator(Validator $validator): bool
    {
        return $validator->errors()->count() === 0;
    }
}

if (! function_exists('failed_validator')) {
    /**
     * @throws ValidationException
     */
    function failed_validator(Validator $validator, string $key = 'error', string $message = 'error'): bool
    {
        $validator->errors()->add($key, $message);

        throw new ValidationException($validator, $validator->errors());
    }
}
