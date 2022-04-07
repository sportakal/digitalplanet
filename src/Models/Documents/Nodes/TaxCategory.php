<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class TaxCategory implements ElementInterface
{
    protected string $taxExemptionReason;
    protected string $taxExemptionReasonCode;
    protected array $taxScheme;

    /**
     * @param string $taxExemptionReason
     */
    public function setTaxExemptionReason(string $taxExemptionReason): void
    {
        $this->taxExemptionReason = $taxExemptionReason;
    }

    /**
     * @param string $taxExemptionReasonCode
     */
    public function setTaxExemptionReasonCode(string $taxExemptionReasonCode): void
    {
        $this->taxExemptionReasonCode = $taxExemptionReasonCode;
    }

    /**
     * @param TaxScheme $taxScheme
     */
    public function setTaxScheme(TaxScheme $taxScheme): void
    {
        $this->taxScheme = $taxScheme->get();
    }


    public function get(): array
    {
        return [
            'TaxExemptionReason' => $this->taxExemptionReason ?? '',
            'TaxExemptionReasonCode' => $this->taxExemptionReasonCode ?? null,
            'TaxScheme' => $this->taxScheme
        ];
    }


}
