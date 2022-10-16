<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\GreaterThanOperator;
use Spork\Conditions\Tests\TestCase;

class GreaterThanOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new GreaterThanOperator;

        $this->assertSame(
            $expectedComputation,
            $condition->compute(
                $needle,
                $haystack
            )
        );
    }

    public function dataProvider()
    {
        return [
            [10, 50, false],
            [0.2, 1, false],
            [10, 5, true],
            [10, 0, true],
            [10, 10, false],
            ['hello world', 'hello other world', false],
            ['hello other world', 'hello world', true],
            [5, 'hello world', false],
            ['2018-01-01', '2019-01-01', false],
            ['2018-01-01', '2017-01-01', true],
            [['2018-01-01'], new class
            {
            }, false, ],
        ];
    }
}
