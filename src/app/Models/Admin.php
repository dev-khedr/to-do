<?php

namespace App\Models;

use App\Core\Traits\Models\HasAuthenticatable;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Raid\Core\Authentication\Authenticatable\Contracts\AuthenticatableInterface;

class Admin extends Authenticatable implements AuthenticatableInterface
{
    use HasAuthenticatable;
    use HasApiTokens;
    use Filterable;
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function isVerified(): true
    {
        return true;
    }
}
