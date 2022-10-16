<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\DoesntContainValueOperator;
use Spork\Conditions\Tests\TestCase;

class DoesntContainValueOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new DoesntContainValueOperator;

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
            ['needle', 'this is my heystack needle', false],
            ['needle', 'this is my heystack', true],
            ['needle', ['this', 'is', 'my', 'haystack', 'needle'], false],
            ['needle', ['this', 'is', 'my', 'haystack'], true],
            ['needle', new class
            {
                public $needle = 'hello world';

                public $thing = 'th';
            }, false, ],
            ['needle', new class
            {
                public $thing = 'th';
            }, true, ],
        ];
    }
}
