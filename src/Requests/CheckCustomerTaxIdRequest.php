<?php

namespace Sportakal\Digitalplanet\Requests;


class CheckCustomerTaxIdRequest extends DigitalplanetRequest
{
    protected int $TaxIdOrPersonalId;

    public function __construct(int $TaxIdOrPersonalId)
    {
        $this->TaxIdOrPersonalId = $TaxIdOrPersonalId;
    }
}
