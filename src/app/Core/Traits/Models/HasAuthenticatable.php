<?php

namespace App\Core\Traits\Models;

use Illuminate\Contracts\Auth\Authenticatable as IlluminateAuthenticatable;

trait HasAuthenticatable
{
    public function findForAuthentication(string $attribute, mixed $value): ?IlluminateAuthenticatable
    {
        return $this->where($attribute, $value)->first();
    }
}
