<?php

namespace Sportakal\Digitalplanet\Models;

class TaxSubTotals extends DigitalplanetModel
{
    protected array $TaxableAmount;
    protected array $TaxAmount;
    protected int $CalculationSequenceNumeric;
    protected array $TransactionCurrencyTaxAmount;
    protected int $Percent;
    protected array $BaseUnitMeasure;
    protected array $PerUnitAmount;
    protected array $TaxCategory;

    /**
     * @param Price $TaxableAmount
     */
    public function setTaxableAmount(Price $TaxableAmount): void
    {
        $this->TaxableAmount = $TaxableAmount->toArray();
    }

    /**
     * @param Price $TaxAmount
     */
    public function setTaxAmount(Price $TaxAmount): void
    {
        $this->TaxAmount = $TaxAmount->toArray();
    }

    /**
     * @param int $CalculationSequenceNumeric
     */
    public function setCalculationSequenceNumeric(int $CalculationSequenceNumeric): void
    {
        $this->CalculationSequenceNumeric = $CalculationSequenceNumeric;
    }

    /**
     * @param Price $TransactionCurrencyTaxAmount
     */
    public function setTransactionCurrencyTaxAmount(Price $TransactionCurrencyTaxAmount): void
    {
        $this->TransactionCurrencyTaxAmount = $TransactionCurrencyTaxAmount->toArray();
    }

    /**
     * @param int $Percent
     */
    public function setPercent(int $Percent): void
    {
        $this->Percent = $Percent;
    }

    /**
     * @param BaseUnitMeasure $BaseUnitMeasure
     */
    public function setBaseUnitMeasure(BaseUnitMeasure $BaseUnitMeasure): void
    {
        $this->BaseUnitMeasure = $BaseUnitMeasure->toArray();
    }

    /**
     * @param Price $PerUnitAmount
     */
    public function setPerUnitAmount(Price $PerUnitAmount): void
    {
        $this->PerUnitAmount = $PerUnitAmount->toArray();
    }

    /**
     * @param TaxCategory $TaxCategory
     */
    public function setTaxCategory(TaxCategory $TaxCategory): void
    {
        $this->TaxCategory = $TaxCategory->toArray();
    }
}
