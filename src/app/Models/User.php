<?php

namespace App\Models;

use App\Core\Traits\Models\CanAuthenticate;
use EloquentFilter\Filterable;
use Illuminate\Contracts\Auth\Authenticatable as IlluminateAuthenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Raid\Core\Authentication\Authables\Contracts\Authable;

class User extends Authenticatable implements Authable
{
    use CanAuthenticate;
    use Filterable;
    use HasApiTokens;
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

    public function taskLists(): HasMany
    {
        return $this->hasMany(TaskList::class);
    }
}
