<?php

namespace App\Models;

use App\Core\Traits\Models\HasAuthenticatable;
use App\Enums\VerificationType;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as IlluminateUser;
use Laravel\Sanctum\HasApiTokens;
use Raid\Guardian\Authenticatable\Contracts\AuthenticatableInterface;

class User extends IlluminateUser implements AuthenticatableInterface
{
    use Filterable;
    use HasApiTokens;
    use HasAuthenticatable;
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        //        'password',
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

    public function taskLists(): HasMany
    {
        return $this->hasMany(TaskList::class);
    }

    public function verification(): MorphOne
    {
        return $this->morphOne(Verification::class, 'verifiable');
    }

    public function twoFactorEmailVerification(): ?Model
    {
        return $this->verification()->where('type', VerificationType::TWO_FACTOR_EMAIL)->first();
    }

    public function twoFactorPhoneVerification(): ?Model
    {
        return $this->verification()->where('type', VerificationType::TWO_FACTOR_PHONE)->first();
    }
}
