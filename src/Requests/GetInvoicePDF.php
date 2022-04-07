<?php

namespace Sportakal\Digitalplanet\Requests;

class GetInvoicePDF extends MakeRequest
{
    public function __construct(string $uuid)
    {
        $this->SOAPAction = '"http://tempuri.org/GetInvoicePDF"';
        $this->nodeName = 'GetInvoicePDF';
        $this->nodeValue = [
            'UUID' => $uuid,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}
