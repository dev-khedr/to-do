<?php

namespace App\Core\Traits\Models;

use Illuminate\Contracts\Auth\Authenticatable as IlluminateAuthenticatable;

trait CanAuthenticate
{
    public function findForWorker(string $column, mixed $value): ?IlluminateAuthenticatable
    {
        return $this->where($column, $value)->first();
    }
}
