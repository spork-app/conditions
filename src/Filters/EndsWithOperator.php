<?php

namespace Spork\Conditions\Filters;

use Illuminate\Support\Str;

class EndsWithOperator extends AbstractLogicalOperator
{
    public function compute(mixed $needle, mixed $haystack): bool
    {
        return Str::endsWith($haystack, $needle);
    }
}
