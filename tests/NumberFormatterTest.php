<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;

class NumberFormatterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $number
     * @param $expected
     */
    public function testFormat($number, $expected)
    {
        $numberFormatter = new NumberFormatter();

        $this->assertEquals(
            $expected,
            $numberFormatter->format(floatval($number))
        );
    }
    
    /**
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            [1111111, '1.11M'],
            [555444, '555K'],
            [999500, '1.00M'],
            [999490, '999K'],
            [99950, '100K'],
            [99949, '99 949'],
            [55554.55, '55 555'],
            [999.9999, '1 000'],
            [999.99, '999.99'],
            [999.9, '999.90'],
            [66.6666, '66.67'],
            [10.00, '10'],
            [0, '0'],
            [-111110.99, '-111K'],
        ];
    }
}