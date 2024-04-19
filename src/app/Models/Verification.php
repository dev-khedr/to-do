<?php

namespace App\Models;

use Carbon\CarbonInterface;
use EloquentFilter\Filterable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Verification extends Model
{
    use Filterable;
    use HasUuids;

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

    public function getSmsMessage(): string
    {
        return __('message.verification_sms_message', [
            'code' => $this->attributes['code'],
        ]);
    }

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
