<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use function PHPUnit\Framework\isFalse;

class Phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ( ! preg_match('/^[0-9]{11}$/', $value)){
            $fail('Значение поля :attribute должно состоять из 11 цифр');
        }
    }
}
