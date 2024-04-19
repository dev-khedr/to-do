<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Verification extends Model
{
    use Filterable;

    const UPDATED_AT = null;

    protected $fillable = [
        'type',
        'code',
    ];

    public function scopeValid(Builder $builder, string $verifiableId, string $code, string $type): Builder
    {
        return $builder->filter([
            'verifiableId' => $verifiableId,
            'code' => $code,
            'type' => $type,
            'expiredAt' => now()->subMinutes(5),
        ]);
    }

    public function getPhoneMessage(): string
    {
        return __('message.verification_phone_message', [
            'code' => $this->attributes['code'],
        ]);
    }

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
