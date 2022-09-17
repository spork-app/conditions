<?php

namespace Spork\Conditions\Filters;

use Carbon\Carbon;

class LessThanOrEqualToOperator extends AbstractLogicalOperator
{
    public function compute(mixed $firstValue, mixed $secondValue): bool
    {
        return (new LessThanOperator)->compute($firstValue, $secondValue) || $firstValue === $secondValue;
    }
}
