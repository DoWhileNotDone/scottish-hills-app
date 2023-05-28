<?php

namespace Tests\Unit;

use App\Helpers\BrandbankCodilityHelper;
use Tests\TestCase;

class BrandbankCodilityHelperTest extends TestCase
{
    protected BrandbankCodilityHelper $BrandbankCodilityHelper;

    public function setUp(): void
    {
        parent::setUp();
        $this->brandbankCodilityHelper = new BrandbankCodilityHelper();
    }

    /**
     * @dataProvider dataProvider
     */
    public function testBinaryGapHelper(int $returnNo, string $expectedJson): void
    {
        $filePath = storage_path('app/public/brandbank.csv');

        $this->assertEquals($expectedJson, $this->brandbankCodilityHelper->solution($filePath, $returnNo));
    }

    public static function dataProvider(): array
    {
        return [
            '10' => [
                'returnNo' => 10,
                'expectedJson' => '[{"rank":1,"orderNo":" 24046","value":42839.74999999999},{"rank":2,"orderNo":" 5471","value":22886.39},{"rank":3,"orderNo":" 72447","value":22199.079999999998},{"rank":4,"orderNo":" 21083","value":21898.119999999984},{"rank":5,"orderNo":" 23756","value":18655.96000000001},{"rank":6,"orderNo":" 9164","value":18360.89999999999},{"rank":7,"orderNo":" 7132","value":18078.199999999993},{"rank":8,"orderNo":" 68071","value":13045.91000000001},{"rank":9,"orderNo":" 26959","value":11682.740000000003},{"rank":10,"orderNo":" 3733","value":11162.21}]',
            ],
            '5' => [
                'returnNo' => 5,
                'expectedJson' => '[{"rank":1,"orderNo":" 24046","value":42839.74999999999},{"rank":2,"orderNo":" 5471","value":22886.39},{"rank":3,"orderNo":" 72447","value":22199.079999999998},{"rank":4,"orderNo":" 21083","value":21898.119999999984},{"rank":5,"orderNo":" 23756","value":18655.96000000001}]',
            ],
        ];
    }
}
