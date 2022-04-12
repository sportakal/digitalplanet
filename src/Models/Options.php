<?php

namespace Sportakal\Digitalplanet\Models;

class Options extends DigitalplanetModel
{
    protected string $OptionText;
    protected string $OptionValue;

    public function __construct(string $OptionText, string $OptionValue)
    {
        $this->OptionText = $OptionText;
        $this->OptionValue = $OptionValue;
    }
}
