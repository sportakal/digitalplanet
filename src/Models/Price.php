<?php

namespace Sportakal\Digitalplanet\Models;

class Price extends DigitalplanetModel
{
    protected string $Currency;
    protected string $Amount;

    public function __construct(string $Currency, float $Amount)
    {
        $this->Currency = $Currency;
        $this->Amount = (string)$Amount;
    }
}
