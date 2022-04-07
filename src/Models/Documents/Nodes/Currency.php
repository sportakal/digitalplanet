<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Currency implements ElementInterface
{
    protected string $attribute;
    protected string $value;

    public function __construct(string $attribute, string $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    public function get(): array
    {
        return [
            'Attribute' => $this->attribute,
            'Value' => $this->value
        ];
    }


}
