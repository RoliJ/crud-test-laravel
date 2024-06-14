<?php

namespace App\Rules;

use Closure;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\NumberParseException;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneValidation implements ValidationRule
{
    protected $countryCode;

    public function __construct($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $phoneUtil = PhoneNumberUtil::getInstance();
        try {
            $phoneNumber = $phoneUtil->parse($value, $this->countryCode);
            if (!$phoneUtil->isValidNumber($phoneNumber)) {
                $fail('Invalid phone number.');
            }
        } catch (NumberParseException $e) {
            $fail('Invalid phone number format.');
        }
    }
}
