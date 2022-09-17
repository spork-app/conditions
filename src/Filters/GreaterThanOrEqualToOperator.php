<?php

namespace Spork\Conditions\Filters;

use Carbon\Carbon;

class GreaterThanOrEqualToOperator extends AbstractLogicalOperator
{
    public function compute(mixed $firstValue, mixed $secondValue): bool
    {
        return (new GreaterThanOperator)->compute($firstValue, $secondValue) || $firstValue === $secondValue;
    }
}
