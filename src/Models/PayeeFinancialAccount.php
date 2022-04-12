<?php

namespace Sportakal\Digitalplanet\Models;

class PayeeFinancialAccount extends DigitalplanetModel
{
    protected string $ID;
    protected string $CurrencyCode;
    protected string $PaymentNote;

    public function __construct(string $ID, string $CurrencyCode, string $PaymentNote)
    {
        $this->ID = $ID;
        $this->CurrencyCode = $CurrencyCode;
        $this->PaymentNote = $PaymentNote;
    }

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string $CurrencyCode
     */
    public function setCurrencyCode(string $CurrencyCode): void
    {
        $this->CurrencyCode = $CurrencyCode;
    }

    /**
     * @param string $PaymentNote
     */
    public function setPaymentNote(string $PaymentNote): void
    {
        $this->PaymentNote = $PaymentNote;
    }
}
