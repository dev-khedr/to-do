<?php

namespace App\Core\Traits\Models;

use Illuminate\Contracts\Auth\Authenticatable;

trait HasAuthenticatable
{
    public function findForAuthentication(string $attribute, mixed $value): ?Authenticatable
    {
        return $this->where($attribute, $value)->first();
    }
}
