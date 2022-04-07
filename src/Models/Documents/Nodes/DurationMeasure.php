<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class DurationMeasure implements ElementInterface
{
    protected string $attribute; //ANN:ANNUAL, MON:MONTH, DAY:DAY, HUR:HOUR
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
