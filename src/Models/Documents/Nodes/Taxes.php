<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Taxes implements ElementInterface
{
    protected string $withholding;
    protected array $taxAmount;
    protected array $taxSubTotals;

    /**
     * @param bool $withholding
     */
    public function setWithholding(bool $withholding): void
    {
        $this->withholding = $withholding ? 'true' : 'false';
    }

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
    public function setTaxSubTotals(TaxSubTotals $taxSubTotals): void
    {
        $this->taxSubTotals = $taxSubTotals->get();
    }


    public function get(): array
    {
        return [
            'Withholding' => $this->withholding,
            'TaxAmount' => $this->taxAmount,
            'TaxSubTotals' => $this->taxSubTotals,
        ];
    }


}
