<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Identification implements ElementInterface
{
    protected string $attribute;
    protected int $value;

    public function __construct(string $attribute, int $value)
    {
        $this->attribute = $attribute;
        $this->value = $value;
    }

    /**
     * @param string $attribute
     */
    public function setAttribute(string $attribute): void
    {
        $this->attribute = $attribute;
    }

    /**
     * @param string $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function get(): array
    {
        return [
            '_key' => 'Identification',
            'Attribute' => $this->attribute,
            'Value' => $this->value
        ];
    }


}
