<?php

namespace Spork\Conditions\Filters;

class DoesntContainValueOperator extends AbstractLogicalOperator
{
    public function compute(mixed $needle, mixed $haystack): bool
    {
        return (new ContainsValueOperator)->butTheOpposite($needle, $haystack);
    }
}
