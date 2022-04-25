<?php

namespace Sportakal\Digitalplanet\Requests;


class CheckCustomerTaxIdRequest extends DigitalplanetRequest
{
    protected string $TaxIdOrPersonalId;

    public function __construct(string $TaxIdOrPersonalId)
    {
        $this->TaxIdOrPersonalId = $TaxIdOrPersonalId;
    }
}
