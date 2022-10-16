<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\LessThanOperator;
use Spork\Conditions\Tests\TestCase;

class LessThanOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new LessThanOperator;

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
            [10, 50, true],
            [0.2, 1, true],
            [10, 5, false],
            [10, 0, false],
            [10, 10, false],
            ['hello world', 'hello other world', true],
            ['hello other world', 'hello world', false],
            ['hello world', 'hello world', false],
            ['hello world', 5, false],
            [5, 'hello world', true],
            ['2018-01-01', '2019-01-01', true],
            ['2018-01-01', '2017-01-01', false],
            [['2018-01-01'], new class
            {
            }, false, ],
        ];
    }
}
