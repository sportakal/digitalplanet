<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class ExchangeRate implements ElementInterface
{
    protected string $type;
    protected string $sourceCurrencyCode;
    protected string $targetCurrencyCode;
    protected string $calculationRate;
    protected string $date;

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @param string $sourceCurrencyCode
     */
    public function setSourceCurrencyCode(string $sourceCurrencyCode): void
    {
        $this->sourceCurrencyCode = $sourceCurrencyCode;
    }

    /**
     * @param string $targetCurrencyCode
     */
    public function setTargetCurrencyCode(string $targetCurrencyCode): void
    {
        $this->targetCurrencyCode = $targetCurrencyCode;
    }

    /**
     * @param string $calculationRate
     */
    public function setCalculationRate(string $calculationRate): void
    {
        $this->calculationRate = $calculationRate;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }


    public function get(): array
    {
        return [
            'Type' => $this->type,
            'SourceCurrencyCode' => $this->sourceCurrencyCode,
            'TargetCurrencyCode' => $this->targetCurrencyCode,
            'CalculationRate' => $this->calculationRate,
            'Date' => $this->date
        ];
    }


}
