<?php

namespace Sportakal\Digitalplanet\Models;

class PaymentTerms extends DigitalplanetModel
{
    protected string $Note;
    protected int $PenaltySurchargePercent;
    protected array $PaymentTermsAmount;

    /**
     * @param string $Note
     */
    public function setNote(string $Note): void
    {
        $this->Note = $Note;
    }

    /**
     * @param int $PenaltySurchargePercent
     */
    public function setPenaltySurchargePercent(int $PenaltySurchargePercent): void
    {
        $this->PenaltySurchargePercent = $PenaltySurchargePercent;
    }

    /**
     * @param Price $PaymentTermsAmount
     */
    public function setPaymentTermsAmount(Price $PaymentTermsAmount): void
    {
        $this->PaymentTermsAmount = $PaymentTermsAmount->toArray();
    }
}
