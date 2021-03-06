<?php

namespace Sportakal\Digitalplanet\Models;

class Identification extends DigitalplanetModel
{
    protected string $Attribute;
    protected string $Value;

    public function __construct(string $Attribute, string $Value)
    {
        $this->Attribute = $Attribute;
        $this->Value = $Value;
    }

    /**
     * @param string $Attribute
     */
    public function setAttribute(string $Attribute): void
    {
        $this->Attribute = $Attribute;
    }

    /**
     * @param string $Value
     */
    public function setValue(string $Value): void
    {
        $this->Value = $Value;
    }
}
