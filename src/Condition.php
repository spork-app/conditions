<?php

namespace Spork\Conditions;;

use App\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Kregel\LaravelAbstract\AbstractModelTrait;

class Condition extends AbstractModel
{
    use HasFactory, AbstractModelTrait;

    protected $filter = [
        'comparator',
        'value',
        'parameter',
    ];

    public function conditionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getComparator(): string
    {
        return $this->comparator;
    }

    public function getComparatorField(): string
    {
        return $this->parameter;
    }

    /**
     * @return int|string
     */
    public function getComparatorValue()
    {
        return $this->value;
    }
}