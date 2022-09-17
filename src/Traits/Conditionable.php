<?php

namespace Spork\Conditions\Models\Traits;

use App\Models\Condition;
use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @property Condition[] $conditions
 */
trait Conditionable
{
    public function conditions(): MorphMany
    {
        return $this->morphMany(Condition::class, 'conditionable');
    }
}
