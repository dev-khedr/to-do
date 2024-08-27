<?php

namespace App\Core\Traits\Models;

use Raid\Guardian\Authenticatable\Contracts\AuthenticatableInterface;

trait HasAuthenticatable
{
    public function findForAuthentication(string $attribute, mixed $value): ?AuthenticatableInterface
    {
        return $this->where($attribute, $value)->first();
    }
}
