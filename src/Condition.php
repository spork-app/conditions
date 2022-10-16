<?php

namespace Spork\Conditions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Kregel\LaravelAbstract\AbstractModelTrait;
use Spork\Core\Models\AbstractModel;

class Condition extends AbstractModel
{
    use HasFactory, AbstractModelTrait;

    protected $fillable = [
        'comparator',
        'value',
        'parameter',
        'conditionable_type',
        'conditionable_id',
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

    public function getValidationCreateRules(): array
    {
        return [
            'comparator' => 'required',
            'value' => 'required',
            'parameter' => 'required',
            'conditionable_type' => 'required',
            'conditionable_id' => 'required',
        ];
    }
}
