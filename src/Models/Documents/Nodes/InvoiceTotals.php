<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class InvoiceTotals implements ElementInterface
{
    protected array $lineExtensionAmount;
    protected array $taxExclusiveAmount;
    protected array $taxInclusiveAmount;
    protected array $allowanceTotalAmount;
    protected array $chargeTotalAmount;
    protected array $payableRoundingAmount;
    protected array $payableAmount;

    /**
     * @param Price $lineExtensionAmount
     */
    public function setLineExtensionAmount(Price $lineExtensionAmount): void
    {
        $this->lineExtensionAmount = $lineExtensionAmount->get();
    }

    /**
     * @param Price $taxExclusiveAmount
     */
    public function setTaxExclusiveAmount(Price $taxExclusiveAmount): void
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount->get();
    }

    /**
     * @param Price $taxInclusiveAmount
     */
    public function setTaxInclusiveAmount(Price $taxInclusiveAmount): void
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount->get();
    }

    /**
     * @param Price $allowanceTotalAmount
     */
    public function setAllowanceTotalAmount(Price $allowanceTotalAmount): void
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount->get();
    }

    /**
     * @param Price $chargeTotalAmount
     */
    public function setChargeTotalAmount(Price $chargeTotalAmount): void
    {
        $this->chargeTotalAmount = $chargeTotalAmount->get();
    }

    /**
     * @param Price $payableRoundingAmount
     */
    public function setPayableRoundingAmount(Price $payableRoundingAmount): void
    {
        $this->payableRoundingAmount = $payableRoundingAmount->get();
    }

    /**
     * @param Price $payableAmount
     */
    public function setPayableAmount(Price $payableAmount): void
    {
        $this->payableAmount = $payableAmount->get();
    }


    public function get(): array
    {
        return [
            'LineExtensionAmount' => $this->lineExtensionAmount,
            'TaxExclusiveAmount' => $this->taxExclusiveAmount,
            'TaxInclusiveAmount' => $this->taxInclusiveAmount,
            'AllowanceTotalAmount' => $this->allowanceTotalAmount ?? null,
            'ChargeTotalAmount' => $this->chargeTotalAmount ?? null,
            'PayableRoundingAmount' => $this->payableRoundingAmount ?? null,
            'PayableAmount' => $this->payableAmount,
        ];
    }
}
