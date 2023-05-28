<?php

namespace Tests\Unit;

use App\Helpers\BinaryGapHelper;
use Tests\TestCase;

/**
 * For example, number 9 has binary representation 1001 and contains a binary gap of length 2.
 * The number 529 has binary representation 1000010001 and contains two binary gaps:
 *  one of length 4 and one of length 3.
 * The number 20 has binary representation 10100 and contains one binary gap of length 1.
 * The number 15 has binary representation 1111 and has no binary gaps.
 * The number 32 has binary representation 100000 and has no binary gaps.
 * For example, given N = 1041 the function should return 5,
 *  because N has binary representation 10000010001 and so its longest binary gap is of length 5.
 */
class BinaryGapHelperTest extends TestCase
{
    protected BinaryGapHelper $binaryGapHelper;

    public function setUp(): void
    {
        parent::setUp();
        $this->binaryGapHelper = new BinaryGapHelper();
    }

    /**
     * @dataProvider gapIntegerProvider
     */
    public function testBinaryGapHelper(int $value, int $gap): void
    {
        $this->assertEquals($gap, $this->binaryGapHelper->solution($value));
    }

    public static function gapIntegerProvider(): array
    {
        return [
            '9 has binary representation 1001' => [
                'value' => 9,
                'gap' => 2
            ],
            '529 has binary representation 1000010001' => [
                'value' => 529,
                'gap' => 4
            ],
            '20 has binary representation 10100' => [
                'value' => 20,
                'gap' => 1
            ],
            '15 has binary representation 1111' => [
                'value' => 15,
                'gap' => 0
            ],
            '32 has binary representation 100000' => [
                'value' => 32,
                'gap' => 0
            ],
            '1041 has binary representation 10000010001' => [
                'value' => 1041,
                'gap' => 5
            ],
            '-5 is a negative number and not counted' => [
                'value' => -5,
                'gap' => 0
            ],
            '0 is a non positive number and not counted' => [
                'value' => 0,
                'gap' => 0
            ],
        ];
    }
}
