<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class InvoicedQuantity implements ElementInterface
{
    protected string $unitCode;
    protected string $quantity;

    public function __construct(string $unitCode, string $quantity)
    {
        $this->unitCode = $unitCode;
        $this->quantity = $quantity;
    }

    public function get(): array
    {
        return [
            'UnitCode' => $this->unitCode,
            'Quantity' => $this->quantity
        ];
    }


}
