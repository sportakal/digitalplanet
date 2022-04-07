<?php

namespace Sportakal\Digitalplanet\Requests;


class SendEArchiveData extends MakeRequest
{
    public function __construct(
        string $corporateCode,
        string $invoiceRawData,
        string $mapCode = '',
        string $receiverPostboxName = '',
    )
    {
        $this->SOAPAction = '"http://tempuri.org/SendEArchiveData"';
        $this->nodeName = 'SendEArchiveData';
        $this->nodeValue = [
            'CorporateCode' => $corporateCode,
            'InvoiceRawData' => $invoiceRawData,
            'MapCode' => $mapCode,
            'ReceiverPostboxName' => $receiverPostboxName,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}

