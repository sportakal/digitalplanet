<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Options implements ElementInterface
{
    protected string $optionText;
    protected string $optionValue;

    public function __construct(string $optionText, string $optionValue)
    {
        $this->optionText = $optionText;
        $this->optionValue = $optionValue;
    }

    public function get(): array
    {
        return [
            'OptionText' => $this->optionText,
            'OptionValue' => $this->optionValue
        ];
    }


}
