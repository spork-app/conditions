<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\ContainsValueOperator;
use Spork\Conditions\Filters\EndsWithOperator;
use Spork\Conditions\Filters\EqualsValueOperator;
use Spork\Conditions\Tests\TestCase;

class EndsWithOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new EndsWithOperator;

        $this->assertSame($expectedComputation, $condition->compute($needle, $haystack));
    }

    public function dataProvider()
    {
        return [
            ['needle', 'My string ends with needle', true],
            ['needle', 'this is my heystack', false],
            ['hope', 'starwar', false],
        ];
    }
}