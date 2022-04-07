<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class BaseUnitMeasure implements ElementInterface
{
    protected string $unitCode;
    protected string $value;

    public function __construct(string $unitCode, string $value)
    {
        $this->unitCode = $unitCode;
        $this->value = $value;
    }

    public function get(): array
    {
        return [
            'UnitCode' => $this->unitCode,
            'Value' => $this->value
        ];
    }


}
