<?php

namespace Sportakal\Digitalplanet\Requests;

class GetInvoicePDFByInvoiceIdWithoutDirection extends MakeRequest
{
    public function __construct(string $invoice_id)
    {
        $this->SOAPAction = '"http://tempuri.org/GetInvoicePDFByInvoiceIdWithoutDirection"';
        $this->nodeName = 'GetInvoicePDFByInvoiceIdWithoutDirection';
        $this->nodeValue = [
            'InvoiceId' => $invoice_id,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}
