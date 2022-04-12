<?php

namespace Sportakal\Digitalplanet\Models;

class Identification extends DigitalplanetModel
{
    protected string $Attribute;
    protected int $Value;

    public function __construct(string $Attribute, int $Value)
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
    public function setValue(int $Value): void
    {
        $this->Value = $Value;
    }
}
