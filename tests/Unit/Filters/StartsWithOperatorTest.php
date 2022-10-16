<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\StartsWithOperator;
use Spork\Conditions\Tests\TestCase;

class StartsWithOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new StartsWithOperator;

        $this->assertSame($expectedComputation, $condition->compute($needle, $haystack));
    }

    public function dataProvider()
    {
        return [
            ['needle', 'needle starts with it does', true],
            ['needle', 'this needle doesnt start with it', false],
            ['hope', 'starwar', false],
        ];
    }
}
