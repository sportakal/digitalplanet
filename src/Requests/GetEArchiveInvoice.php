<?php

namespace Sportakal\Digitalplanet\Requests;

class GetEArchiveInvoice extends MakeRequest
{
    public function __construct(string $value, $valueType = 'INVOICEID', $fileType = 'PDF')
    {
        $this->SOAPAction = '"http://tempuri.org/GetEArchiveInvoice"';
        $this->nodeName = 'GetEArchiveInvoice';
        $this->nodeValue = [
            'Value' => $value,
            'ValueType' => $valueType,
            'FileType' => $fileType,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }
}
