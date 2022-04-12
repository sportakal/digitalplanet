<?php

namespace Sportakal\Digitalplanet\Models;

class Taxes extends DigitalplanetModel
{
    protected string $withholding;
    protected array $TaxAmount;
    protected array $TaxSubTotals;

    /**
     * @param bool $withholding
     */
    public function setWithholding(bool $withholding): void
    {
        $this->withholding = $withholding ? 'true' : 'false';
    }

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
    public function setTaxSubTotals(TaxSubTotals $TaxSubTotals): void
    {
        $this->TaxSubTotals = $TaxSubTotals->toArray();
    }
}
