<?php

/* Get Invoice PDF by UUID for E-Invoices. */

namespace Sportakal\Digitalplanet\Requests;

class GetInvoicePDFRequest extends DigitalplanetRequest
{
    protected string $UUID;

    public function __construct(string $UUID)
    {
        $this->UUID = $UUID;
    }
}
