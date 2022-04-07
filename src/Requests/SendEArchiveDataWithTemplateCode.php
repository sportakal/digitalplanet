<?php

namespace Sportakal\Digitalplanet\Requests;


use Illuminate\Support\Facades\Config;

class SendEArchiveDataWithTemplateCode extends MakeRequest
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
            $templateCode = Config::get('digitalplanet.template_codes.efatura', 'EARCHIVE');
        }

        $this->SOAPAction = '"http://tempuri.org/SendEArchiveDataWithTemplateCode"';
        $this->nodeName = 'SendEArchiveDataWithTemplateCode';
        $this->nodeValue = [
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

//SendEArchiveDataWithTemplateCode
