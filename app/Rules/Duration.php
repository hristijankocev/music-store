<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\InvokableRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Duration implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail): void
    {
        // Check if a given value can be represented as a "duration"
        // i.e. 00:03:21 is a duration
        $timestamp = explode(':', $value);

        if (count($timestamp) === 3) {

            $total = ((int)$timestamp[0] * 3600) + ((int)$timestamp[1] * 60) + (int)$timestamp[2];

            if ($total <= 0) {
                $fail('The :attribute must be greater than 0 seconds.');
            }

            return;
        }
        $fail('The :attribute must be in the correct form.');
    }
}
