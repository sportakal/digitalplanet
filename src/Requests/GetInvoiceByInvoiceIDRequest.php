<?php

namespace Sportakal\Digitalplanet\Requests;


class GetInvoiceByInvoiceIDRequest extends DigitalplanetRequest
{

    protected string $InvoiceID;

    /*
     * @param string $Direction
     * Incoming (Gelen E-faturalar için)
     * Outgoing (Gönderilen E-faturalar için)
     * Earchive (E-Arşiv faturaları için)
     * AllDirection
     */
    protected string $Direction;


    public function __construct(string $Invoice_id, string $Direction)
    {
        $this->InvoiceID = $Invoice_id;
        $this->Direction = $Direction;
    }
}

