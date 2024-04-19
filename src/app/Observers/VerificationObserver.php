<?php

namespace App\Observers;

use App\Models\Verification;

class VerificationObserver
{
    public function creating(Verification $verification): void
    {
        $this->setCode($verification);
    }

    private function setCode(Verification $verification): void
    {
        if ($verification->hasAttribute('code')) {
            return;
        }

        $verification->setAttribute('code', generate_code());
    }
}
