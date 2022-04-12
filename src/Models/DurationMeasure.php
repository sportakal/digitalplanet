<?php

namespace Sportakal\Digitalplanet\Models;

class DurationMeasure extends DigitalplanetModel
{
    protected string $Attribute; //ANN:ANNUAL, MON:MONTH, DAY:DAY, HUR:HOUR
    protected string $Value;

    public function __construct(string $Attribute, string $Value)
    {
        $this->Attribute = $Attribute;
        $this->Value = $Value;
    }
}
