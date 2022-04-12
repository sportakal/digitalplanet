<?php

namespace Sportakal\Digitalplanet\Models;

class InvoiceLines extends DigitalplanetModel
{
    protected array $Lines = ['_key' => 'Line'];

    /**
     * @param Line $Line
     */
    public function setLine(Line $Line): void
    {
        $this->Lines[] = $Line->toArray();
    }


    public function toArray(): array
    {
        return get_object_vars($this)['Lines'];
    }
}
