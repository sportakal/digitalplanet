<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Price implements ElementInterface
{
    protected string $currency;
    protected float $amount;

    public function __construct(string $currency, float $amount)
    {
        $this->currency = $currency;
        $this->amount = $amount;
    }

    public function get(): array
    {
        return [
            'Currency' => $this->currency,
            'Amount' => (string)$this->amount
        ];
    }


}
