<?php

namespace Sportakal\Digitalplanet\Models;

class InvoicedQuantity extends DigitalplanetModel
{
    protected string $UnitCode;
    protected string $Quantity;

    public function __construct(string $UnitCode, string $Quantity)
    {
        $this->UnitCode = $UnitCode;
        $this->Quantity = $Quantity;
    }
}
