<?php

namespace Sportakal\Digitalplanet\Models;

class BaseUnitMeasure extends DigitalplanetModel
{
    protected string $UnitCode;
    protected string $Value;

    public function __construct(string $UnitCode, string $Value)
    {
        $this->UnitCode = $UnitCode;
        $this->Value = $Value;
    }
}
