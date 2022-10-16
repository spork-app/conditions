<?php

namespace Spork\Conditions\Filters;

class GreaterThanOrEqualToOperator extends AbstractLogicalOperator
{
    public function compute(mixed $firstValue, mixed $secondValue): bool
    {
        return (new GreaterThanOperator)->compute($firstValue, $secondValue) || $firstValue === $secondValue;
    }
}
