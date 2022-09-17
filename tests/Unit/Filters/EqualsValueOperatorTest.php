<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\ContainsValueOperator;
use Spork\Conditions\Filters\EqualsValueOperator;
use Spork\Conditions\Tests\TestCase;

class EqualsOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new EqualsValueOperator;

        $this->assertSame($expectedComputation, $condition->compute($needle, $haystack));
    }

    public function dataProvider()
    {
        return [
            ['needle', 'needle', true],
            ['needle', 'this is my heystack', false],
            [5, 5, true],
            [null, null, true],
        ];
    }
}