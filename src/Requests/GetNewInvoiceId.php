<?php

namespace Sportakal\Digitalplanet\Requests;

class GetNewInvoiceId extends MakeRequest
{
    public function __construct(
        string $year,
        string $reconciliationId,
        string $invoiceType, //0:efatura, 1:e-arşiv, 2:e-arşiv ticari
        string $templateCode = null,
    )
    {
        $this->SOAPAction = '"http://tempuri.org/GetNewInvoiceId"';
        $this->nodeName = 'GetNewInvoiceId';
        $this->nodeValue = [
            'templateCode' => $templateCode,
            'year' => $year,
            'invoiceType' => $invoiceType,
            'reconciliationId' => $reconciliationId,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }


}
