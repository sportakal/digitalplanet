<?php

namespace Sportakal\Digitalplanet\Requests;


class SendXmlInvoice extends MakeRequest
{
    public function __construct(
        string $corporateCode,
        string $invoiceRawData,
        string $mapCode = '',
        string $receiverPostboxName = '',
    )
    {
        $this->SOAPAction = '"http://tempuri.org/SendXmlInvoice"';
        $this->nodeName = 'SendXmlInvoice';
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
