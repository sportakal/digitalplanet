<?php

namespace Sportakal\Digitalplanet\Requests;

class CheckCustomerTaxId extends MakeRequest
{
    public function __construct(string $taxId)
    {
        $this->SOAPAction = '"http://tempuri.org/CheckCustomerTaxId"';
        $this->nodeName = 'CheckCustomerTaxId';
        $this->nodeValue = [
            'TaxIdOrPersonalId' => $taxId,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }


}
