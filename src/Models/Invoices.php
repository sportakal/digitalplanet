<?php

namespace Sportakal\Digitalplanet\Models;


use Sportakal\Digitalplanet\Traits\ToXmlTrait;

class Invoices extends DigitalplanetModel
{
    use ToXmlTrait;

    protected array $Invoices;

    public function __construct(Invoice $Invoice, $Version = null)
    {
        if (!$Version) {
            $Version = '2.1';
        }
        $this->Invoices = [
            'Version' => $Version,
            'Invoice' => $Invoice->toArray()
        ];
    }


}
