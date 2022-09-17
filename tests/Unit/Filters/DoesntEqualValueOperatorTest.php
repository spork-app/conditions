<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\DoesntEqualValueOperator;
use Spork\Conditions\Tests\TestCase;

class DoesntEqualValueOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new DoesntEqualValueOperator;

        $this->assertSame($expectedComputation, $condition->compute($needle, $haystack));
    }

    public function dataProvider()
    {
        return [
            ['needle', 'needle', false],
            ['needle', 'this is my heystack', true],
            ['hope', 'starwar', true],
            ['', null, true],
        ];
    }
}