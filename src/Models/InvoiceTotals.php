<?php

namespace Sportakal\Digitalplanet\Models;

class InvoiceTotals extends DigitalplanetModel
{
    protected array $LineExtensionAmount;
    protected array $TaxExclusiveAmount;
    protected array $TaxInclusiveAmount;
    protected array $AllowanceTotalAmount;
    protected array $ChargeTotalAmount;
    protected array $PayableRoundingAmount;
    protected array $PayableAmount;

    /**
     * @param Price $LineExtensionAmount
     */
    public function setLineExtensionAmount(Price $LineExtensionAmount): void
    {
        $this->LineExtensionAmount = $LineExtensionAmount->toArray();
    }

    /**
     * @param Price $TaxExclusiveAmount
     */
    public function setTaxExclusiveAmount(Price $TaxExclusiveAmount): void
    {
        $this->TaxExclusiveAmount = $TaxExclusiveAmount->toArray();
    }

    /**
     * @param Price $TaxInclusiveAmount
     */
    public function setTaxInclusiveAmount(Price $TaxInclusiveAmount): void
    {
        $this->TaxInclusiveAmount = $TaxInclusiveAmount->toArray();
    }

    /**
     * @param Price $AllowanceTotalAmount
     */
    public function setAllowanceTotalAmount(Price $AllowanceTotalAmount): void
    {
        $this->AllowanceTotalAmount = $AllowanceTotalAmount->toArray();
    }

    /**
     * @param Price $ChargeTotalAmount
     */
    public function setChargeTotalAmount(Price $ChargeTotalAmount): void
    {
        $this->ChargeTotalAmount = $ChargeTotalAmount->toArray();
    }

    /**
     * @param Price $PayableRoundingAmount
     */
    public function setPayableRoundingAmount(Price $PayableRoundingAmount): void
    {
        $this->PayableRoundingAmount = $PayableRoundingAmount->toArray();
    }

    /**
     * @param Price $PayableAmount
     */
    public function setPayableAmount(Price $PayableAmount): void
    {
        $this->PayableAmount = $PayableAmount->toArray();
    }
}
