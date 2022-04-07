<?php

namespace Sportakal\Digitalplanet\Requests;

class GetInvoiceByInvoiceID extends MakeRequest
{
    public function __construct(string $invoice_id, string $direction = null)
    {
        $this->SOAPAction = '"http://tempuri.org/GetInvoiceByInvoiceID"';
        $this->nodeName = 'GetInvoiceByInvoiceID';
        $this->nodeValue = [
            'InvoiceID' => $invoice_id,
            'Direction' => $direction,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}

