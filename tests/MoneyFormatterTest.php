<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;
use App\Service\MoneyFormatter;

class MoneyFormatterTest extends TestCase
{
    public function testFormatUsd()
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->expects($this->once())
            ->method('format')
            ->with(9999999)
            ->willReturn('9.99M');
        
        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals(
            '$9.99M',
            $moneyFormatter->formatUsd(9999999)
        );
    }
    
    public function testFormatEur()
    {
        $numberFormatter = $this->createMock(NumberFormatter::class);
        $numberFormatter->expects($this->once())
            ->method('format')
            ->with(999.99)
            ->willReturn('999.99');

        $moneyFormatter = new MoneyFormatter($numberFormatter);
        $this->assertEquals(
            '999.99 €',
            $moneyFormatter->formatEur(999.99)
        );
    }
}