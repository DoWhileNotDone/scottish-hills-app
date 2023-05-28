<?php

namespace Tests\Unit;

use App\Helpers\MissingIntegerHelper;
use Tests\TestCase;

/**
 * Write a function:
 * function solution($A);
 * that, given an array A of N integers, returns the smallest positive integer (greater than 0)
 * that does not occur in A.
 * For example, given A = [1, 3, 6, 4, 1, 2], the function should return 5.
 * Given A = [1, 2, 3], the function should return 4.
 * Given A = [−1, −3], the function should return 1.
 */
class MissingIntegerHelperTest extends TestCase
{
    protected MissingIntegerHelper $missingIntegerHelper;

    public function setUp(): void
    {
        parent::setUp();
        $this->missingIntegerHelper = new MissingIntegerHelper();
    }

    /**
     * @dataProvider missingIntegerProvider
     */
    public function testMissingIntegerHelper(array $numbers, int $integer): void
    {
        $this->assertEquals($integer, $this->missingIntegerHelper->solution($numbers));
    }

    public function missingIntegerProvider(): array
    {
        return [
            'A = [1, 3, 6, 4, 1, 2]' => [
                'numbers' => [1, 3, 6, 4, 1, 2],
                'integer' => 5
            ],
            'A = [1, 2, 3]' => [
                'numbers' => [1, 2, 3],
                'integer' => 4
            ],
            'A = [−1, −3]' => [
                'numbers' => [-1, -3],
                'integer' => 1
            ],
        ];
    }
}
