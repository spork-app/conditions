<?php

namespace Spork\Conditions\Filters;

class DoesntEqualValueOperator extends AbstractLogicalOperator
{
    public function compute(mixed $needle, mixed $haystack): bool
    {
        return (new EqualsValueOperator)->butTheOpposite($needle, $haystack);
    }
}