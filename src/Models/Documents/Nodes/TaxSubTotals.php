<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class TaxSubTotals implements ElementInterface
{
    protected array $taxableAmount;
    protected array $taxAmount;
    protected int $calculationSequenceNumeric;
    protected array $transactionCurrencyTaxAmount;
    protected int $percent;
    protected array $baseUnitMeasure;
    protected array $perUnitAmount;
    protected array $taxCategory;

    /**
     * @param Price $taxableAmount
     */
    public function setTaxableAmount(Price $taxableAmount): void
    {
        $this->taxableAmount = $taxableAmount->get();
    }

    /**
     * @param Price $taxAmount
     */
    public function setTaxAmount(Price $taxAmount): void
    {
        $this->taxAmount = $taxAmount->get();
    }

    /**
     * @param int $calculationSequenceNumeric
     */
    public function setCalculationSequenceNumeric(int $calculationSequenceNumeric): void
    {
        $this->calculationSequenceNumeric = $calculationSequenceNumeric;
    }

    /**
     * @param Price $transactionCurrencyTaxAmount
     */
    public function setTransactionCurrencyTaxAmount(Price $transactionCurrencyTaxAmount): void
    {
        $this->transactionCurrencyTaxAmount = $transactionCurrencyTaxAmount->get();
    }

    /**
     * @param int $percent
     */
    public function setPercent(int $percent): void
    {
        $this->percent = $percent;
    }

    /**
     * @param BaseUnitMeasure $baseUnitMeasure
     */
    public function setBaseUnitMeasure(BaseUnitMeasure $baseUnitMeasure): void
    {
        $this->baseUnitMeasure = $baseUnitMeasure->get();
    }

    /**
     * @param Price $perUnitAmount
     */
    public function setPerUnitAmount(Price $perUnitAmount): void
    {
        $this->perUnitAmount = $perUnitAmount->get();
    }

    /**
     * @param TaxCategory $taxCategory
     */
    public function setTaxCategory(TaxCategory $taxCategory): void
    {
        $this->taxCategory = $taxCategory->get();
    }


    public function get(): array
    {
        return [
            'TaxableAmount' => $this->taxableAmount,
            'TaxAmount' => $this->taxAmount,
            'CalculationSequenceNumeric' => $this->calculationSequenceNumeric ?? null,
            'TransactionCurrencyTaxAmount' => $this->transactionCurrencyTaxAmount ?? null,
            'Percent' => $this->percent,
            'BaseUnitMeasure' => $this->baseUnitMeasure ?? null,
            'PerUnitAmount' => $this->perUnitAmount ?? null,
            'TaxCategory' => $this->taxCategory,
        ];
    }


}
