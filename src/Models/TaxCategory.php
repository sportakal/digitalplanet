<?php

namespace Sportakal\Digitalplanet\Models;

class TaxCategory extends DigitalplanetModel
{
    protected string $TaxExemptionReason;
    protected string $TaxExemptionReasonCode;
    protected array $TaxScheme;

    /**
     * @param string $TaxExemptionReason
     */
    public function setTaxExemptionReason(string $TaxExemptionReason): void
    {
        $this->TaxExemptionReason = $TaxExemptionReason;
    }

    /**
     * @param string $TaxExemptionReasonCode
     */
    public function setTaxExemptionReasonCode(string $TaxExemptionReasonCode): void
    {
        $this->TaxExemptionReasonCode = $TaxExemptionReasonCode;
    }

    /**
     * @param TaxScheme $TaxScheme
     */
    public function setTaxScheme(TaxScheme $TaxScheme): void
    {
        $this->TaxScheme = $TaxScheme->toArray();
    }
}
