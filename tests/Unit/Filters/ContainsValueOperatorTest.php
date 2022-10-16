<?php

namespace Spork\Conditions\Tests\Unit\Filters;

use Spork\Conditions\Filters\ContainsValueOperator;
use Spork\Conditions\Tests\TestCase;

class ContainsValueOperatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCompute($needle, $haystack, $expectedComputation)
    {
        $condition = new ContainsValueOperator;

        $this->assertSame($expectedComputation, $condition->compute($needle, $haystack));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testComputeInverse($needle, $haystack, $expectedComputation)
    {
        $condition = new ContainsValueOperator;

        $this->assertSame(
            ! $expectedComputation,
            $condition->inverse(
                $needle,
                $haystack
            )
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testComputeButTheOpposite($needle, $haystack, $expectedComputation)
    {
        $condition = new ContainsValueOperator;

        $this->assertSame(
            ! $expectedComputation,
            $condition->butTheOpposite(
                $needle,
                $haystack
            )
        );
    }

    public function dataProvider()
    {
        return [
            ['needle', 'this is my heystack needle', true],
            ['needle', 'this is my heystack', false],
            ['needle', ['this', 'is', 'my', 'haystack', 'needle'], true],
            ['needle', ['this', 'is', 'my', 'haystack'], false],
            ['needle', new class
            {
                public $needle = 'hello world';

                public $thing = 'th';
            }, true, ],
            ['needle', new class
            {
                public $thing = 'th';
            }, false, ],
        ];
    }
}
