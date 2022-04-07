<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class TaxScheme implements ElementInterface
{
    protected string $name;
    protected string $taxTypeCode;

    public function __construct(string $name, string $taxTypeCode)
    {
        $this->name = $name;
        $this->taxTypeCode = $taxTypeCode;
    }

    public function get(): array
    {
        return [
            'Name' => $this->name,
            'TaxTypeCode' => $this->taxTypeCode
        ];
    }


}
