<?php

namespace Sportakal\Digitalplanet\Requests;

class GetNewInvoiceIdRequest extends DigitalplanetRequest
{
    protected string $Year;
    protected string $reconciliationid;
    protected string $InvoiceType;
    /**
     * 0: E-Fatura
     * 1: E-Arşiv
     * 2: E-Arşiv Ticari
     */
    protected string $TemplateCode;

    public function __construct(
        string $Year,
        string $reconciliationid,
        string $InvoiceType, //0:efatura, 1:e-arşiv, 2:e-arşiv ticari
        string $TemplateCode,
    )
    {
        $this->Year = $Year;
        $this->reconciliationid = $reconciliationid;
        $this->InvoiceType = $InvoiceType;
        $this->TemplateCode = $TemplateCode;
    }
}
