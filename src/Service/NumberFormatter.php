<?php

namespace App\Service;

class NumberFormatter
{
    const M = 'M';
    const K = 'K';
    
    /** @var float */
    private $abs;
    
    /**
     * @param float $number
     * @return string
     */
    public function format(float $number): string
    {
        $this->abs = abs($number);
        $million = 10 ** 6;
        $hundredThousand = 10 ** 5;
        $thousand = 10 ** 3;
        
        if ($this->isRangeValid($million)) {
            $result = number_format($number / $million, 2) . self::M;

        } elseif ($this->isRangeValid($hundredThousand)) {
            $result = number_format($number / $thousand) . self::K;

        } elseif (round($this->abs, 2) >= $thousand) {
            $result = number_format($number, 0, '', ' ');

        } else {
            $result = number_format($number, 2, '.', '');
            
        }

        return $result;
    }
    
    /**
     * @param $range int
     * @return bool
     */
    private function isRangeValid(int $range): bool
    {
        return round($this->abs / $range, 3) >= 1;
    }
}