<?php

namespace Sportakal\Digitalplanet\Models;

class TaxTotal extends DigitalplanetModel
{
    protected array $TaxAmount;
    protected array $TaxSubTotals;

    /**
     * @param Price $TaxAmount
     */
    public function setTaxAmount(Price $TaxAmount): void
    {
        $this->TaxAmount = $TaxAmount->toArray();
    }

    /**
     * @param TaxSubTotals $TaxSubTotals
     */
    public function setTaxSubtotal(TaxSubTotals $TaxSubTotals): void
    {
        $this->TaxSubTotals = $TaxSubTotals->toArray();
    }
}
