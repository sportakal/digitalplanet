<?php

namespace Sportakal\Digitalplanet\Requests;

class GetEArchiveInvoiceRequest extends DigitalplanetRequest
{
    protected string $Value;
    protected string $ValueType;
    protected string $FileType;

    public function __construct(string $Value, $ValueType = 'INVOICEID', $FileType = 'PDF')
    {
        $this->Value = $Value;
        $this->ValueType = $ValueType;
        $this->FileType = $FileType;
    }
}
