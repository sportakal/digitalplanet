<?php

namespace Sportakal\Digitalplanet\Models;

class TaxScheme extends DigitalplanetModel
{
    protected string $Name;
    protected string $TaxTypeCode;

    public function __construct(string $Name, string $TaxTypeCode)
    {
        $this->Name = $Name;
        $this->TaxTypeCode = $TaxTypeCode;
    }
}
