<?php

namespace App\Models;

use App\Core\Traits\Models\CanAuthenticate;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Raid\Core\Authentication\Authables\Contracts\Authable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements Authable
{
    use CanAuthenticate;
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
}
