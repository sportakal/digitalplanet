<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class TaxTotal implements ElementInterface
{
    protected array $taxAmount;
    protected array $taxSubTotals;

    /**
     * @param Price $taxAmount
     */
    public function setTaxAmount(Price $taxAmount): void
    {
        $this->taxAmount = $taxAmount->get();
    }

    /**
     * @param TaxSubTotals $taxSubTotals
     */
    public function setTaxSubtotal(TaxSubTotals $taxSubTotals): void
    {
        $this->taxSubTotals = $taxSubTotals->get();
    }


    public function get(): array
    {
        return [
            'TaxAmount' => $this->taxAmount,
            'TaxSubTotals' => $this->taxSubTotals,
        ];
    }


}
