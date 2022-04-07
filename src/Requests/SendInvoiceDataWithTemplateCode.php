<?php

namespace Sportakal\Digitalplanet\Requests;


use Illuminate\Support\Facades\Config;

class SendInvoiceDataWithTemplateCode extends MakeRequest
{
    public function __construct(
        string $corporateCode,
        string $invoiceRawData,
        string $templateCode = null,
        string $mapCode = '',
        string $receiverPostboxName = '',
    )
    {
        if (!$templateCode) {
            $templateCode = Config::get('digitalplanet.template_codes.efatura', 'MANUAL');
        }

        $this->SOAPAction = '"http://tempuri.org/SendInvoiceDataWithTemplateCode"';
        $this->nodeName = 'SendInvoiceDataWithTemplateCode';
        $this->nodeValue = [
            'FileType' => 'Xml',
            'CorporateCode' => $corporateCode,
            'InvoiceRawData' => $invoiceRawData,
            'MapCode' => $mapCode,
            'ReceiverPostboxName' => $receiverPostboxName,
            'TemplateCode' => $templateCode,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}




