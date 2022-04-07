<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class PaymentTerms implements ElementInterface
{
    protected string $note;
    protected int $penaltySurchargePercent;
    protected array $paymentTermsAmount;

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param int $penaltySurchargePercent
     */
    public function setPenaltySurchargePercent(int $penaltySurchargePercent): void
    {
        $this->penaltySurchargePercent = $penaltySurchargePercent;
    }

    /**
     * @param Price $paymentTermsAmount
     */
    public function setPaymentTermsAmount(Price $paymentTermsAmount): void
    {
        $this->paymentTermsAmount = $paymentTermsAmount->get();
    }


    public function get(): array
    {
        return [
            'Note' => $this->note,
            'PenaltySurchargePercent' => $this->penaltySurchargePercent,
            'PaymentTermsAmount' => $this->paymentTermsAmount,
        ];
    }


}
