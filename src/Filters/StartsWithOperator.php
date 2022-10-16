<?php

namespace Spork\Conditions\Filters;

use Illuminate\Support\Str;

class StartsWithOperator extends AbstractLogicalOperator
{
    public function compute(mixed $needle, mixed $haystack): bool
    {
        return Str::startsWith($haystack, $needle);
    }
}
