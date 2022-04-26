<?php

namespace Sportakal\Digitalplanet\Requests;


use Sportakal\Digitalplanet\Models\Invoices;
use Sportakal\Digitalplanet\Traits\Base64EncodeTrait;

class SendInvoiceDataWithTemplateCodeRequest extends DigitalplanetRequest
{
    use Base64EncodeTrait;

    protected string $CorporateCode;
    protected string $InvoiceRawData;
    protected string $MapCode = '';
    protected string $TemplateCode;
    protected string $ReceiverPostboxName = '';

    public function __construct(
        string   $CorporateCode,
        Invoices $Invoices,
        string   $TemplateCode = 'MANUAL',
        string   $MapCode = '',
        string   $ReceiverPostboxName = ''
    )
    {
        $this->CorporateCode = $CorporateCode;
        $this->InvoiceRawData = $this->base64Encode($Invoices->toHtml());
        $this->TemplateCode = $TemplateCode;
        $this->MapCode = $MapCode;
        $this->ReceiverPostboxName = $ReceiverPostboxName;
    }
}




