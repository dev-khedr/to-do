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
            $this->validateVerification($validator);
        });
    }

    /**
     * @throws ValidationException
     */
    private function validateVerification(Validator $validator): void
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
        return Verification::valid(
            $this->input('verifiableId'),
            $this->input('code'),
            $this->getType($this->route('type')),
        )->first();
    }

    private function getType(string $type): string
    {
        return $type === 'phone' ?
            VerificationType::TWO_FACTOR_PHONE :
            VerificationType::TWO_FACTOR_EMAIL;
    }
}
