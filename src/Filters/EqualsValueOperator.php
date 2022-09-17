<?php

namespace Spork\Conditions\Filters;

class EqualsValueOperator extends AbstractLogicalOperator
{
    public function compute(mixed $needle, mixed $haystack): bool
    {
        return $needle === $haystack;
    }
}