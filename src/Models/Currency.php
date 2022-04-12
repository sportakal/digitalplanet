<?php

namespace Sportakal\Digitalplanet\Models;

class Currency extends DigitalplanetModel
{
    protected string $Attribute;
    protected string $Value;

    public function __construct(string $Attribute, string $Value)
    {
        $this->Attribute = $Attribute;
        $this->Value = $Value;
    }
}
