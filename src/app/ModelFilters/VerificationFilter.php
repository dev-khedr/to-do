<?php

namespace App\ModelFilters;

use Carbon\CarbonInterface;
use EloquentFilter\ModelFilter;

class VerificationFilter extends ModelFilter
{
    protected function verifiableId(string $verifiableId): static
    {
        return $this->where('verifiable_id', $verifiableId);
    }

    protected function code(string $code): static
    {
        return $this->where('code', $code);
    }

    public function expiredAt(CarbonInterface $expiredAt): static
    {
        return $this->where('created_at', '>=', $expiredAt);
    }
}
