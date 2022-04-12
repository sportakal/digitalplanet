<?php

/* Get Invoice PDF by InvoiceId for E-Invoices. */

namespace Sportakal\Digitalplanet\Requests;


class GetInvoicePDFByInvoiceIdWithoutDirectionRequest extends DigitalplanetRequest
{
    protected $InvoiceId;

    public function __construct(string $InvoiceId)
    {
        $this->InvoiceId = $InvoiceId;
    }
}
