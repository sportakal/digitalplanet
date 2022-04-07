<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class PayeeFinancialAccount implements ElementInterface
{
    protected string $id;
    protected string $currencyCode;
    protected string $paymentNote;

    public function __construct(string $id, string $currencyCode, string $paymentNote)
    {
        $this->id = $id;
        $this->currencyCode = $currencyCode;
        $this->paymentNote = $paymentNote;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $currencyCode
     */
    public function setCurrencyCode(string $currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @param string $paymentNote
     */
    public function setPaymentNote(string $paymentNote): void
    {
        $this->paymentNote = $paymentNote;
    }


    public function get(): array
    {
        return [
            'ID' => $this->id,
            'CurrencyCode' => $this->currencyCode,
            'PaymentNote' => $this->paymentNote
        ];
    }


}
