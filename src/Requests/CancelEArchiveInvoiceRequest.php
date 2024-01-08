<?php

namespace Sportakal\Digitalplanet\Requests;


use Carbon\Carbon;

class CancelEArchiveInvoiceRequest extends DigitalplanetRequest
{

    protected string $Value; //ValuType alanında hangi tip verilmiş ise o tipe ait değer girilir. Örneğin Type olarak “INVOICEID” girilmiş ise, “GIB2014000000001” girilebilir.
    protected string $Type; //Faturanın alınacağı parametrenin tipidir. Alabileceği değerler “UUID” , “INVOICEID” ve “REFID” dir. UUID faturanın GUID numarasını temsil eder. INVOICEID faturanın 16 haneli gib numarasını temsil eder. REFID ise gib numarasını müşterilerimiz için Digital Planet’in üretmesi durumunda, müşterilerimizin bize her fatura için ayrı değer olarak gönderdikleri referans numarasını temsil eder.
//    protected string $TotalAmount;
    protected string $CancelDate;

    public function __construct(string $Value,
                                       $Type = 'INVOICEID',
                                       $CancelDate = null
    )
    {
        if ($CancelDate == null) {
            $CancelDate = Carbon::now()->format('Y-m-d H:i:s');
        }

        $this->Value = $Value;
        $this->Type = $Type;
//        $this->TotalAmount = $TotalAmount;
        $this->CancelDate = $CancelDate;
    }
}

