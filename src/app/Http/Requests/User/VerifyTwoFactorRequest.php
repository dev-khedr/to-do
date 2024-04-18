<?php

namespace App\Http\Requests\User;

use App\Enums\VerificationType;
use App\Models\Verification;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class VerifyTwoFactorRequest extends FormRequest
{
    use CommonFormRequest;

    public function rules(): array
    {
        return [
            'verifiableId' => [
                'required',
                'string',
            ],
            'code' => [
                'required',
                'string',
            ],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function () use ($validator) {
            $this->validateVerificationExists($validator);
        });
    }

    /**
     * @throws ValidationException
     */
    private function validateVerificationExists(Validator $validator): void
    {
        $verification = $this->findVerification();

        if ($verification) {
            return;
        }

        failed_validator(
            $validator,
            message: __('validation.invalid_verification'),
        );
    }

    private function findVerification(): ?Verification
    {
        return Verification::filter([
            'verifiableId' => $this->input('verifiableId'),
            'code' => $this->input('code'),
            'type' => $this->getType(),
//            'expiredAt' => now()->subMinutes(5),
        ])->first();
    }

    private function getType(): string
    {
        return $this->route('type') === 'phone' ?
            VerificationType::TWO_FACTOR_PHONE :
            VerificationType::TWO_FACTOR_EMAIL;
    }
}
