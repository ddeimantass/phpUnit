<?php

namespace App\Service;

class MoneyFormatter
{
    const usd = '$';
    const eur = '€';

    /** @var NumberFormatter */
    private $numberFormatter;

    /**
     * @param $numberFormatter
     */
    public function __construct($numberFormatter)
    {
        $this->numberFormatter = $numberFormatter;
    }
    
    /**
     * @param $price float
     * @return string
     */
    public function formatUsd(float $price): string
    {
        $price = $this->numberFormatter->format($price);
        return self::usd . $price;
    }
    
    /**
     * @param $price float
     * @return string
     */
    public function formatEur(float $price): string
    {
        $price = $this->numberFormatter->format($price);
        return $price . ' ' . self::eur;
    }
}