<?php

namespace Sportakal\Digitalplanet\Models;

class ExchangeRate extends DigitalplanetModel
{
    protected string $Type;
    protected string $SourceCurrencyCode;
    protected string $TargetCurrencyCode;
    protected string $CalculationRate;
    protected string $Date;

    /**
     * @param string $Type
     */
    public function setType(string $Type): void
    {
        $this->Type = $Type;
    }

    /**
     * @param string $SourceCurrencyCode
     */
    public function setSourceCurrencyCode(string $SourceCurrencyCode): void
    {
        $this->SourceCurrencyCode = $SourceCurrencyCode;
    }

    /**
     * @param string $TargetCurrencyCode
     */
    public function setTargetCurrencyCode(string $TargetCurrencyCode): void
    {
        $this->TargetCurrencyCode = $TargetCurrencyCode;
    }

    /**
     * @param string $CalculationRate
     */
    public function setCalculationRate(string $CalculationRate): void
    {
        $this->CalculationRate = $CalculationRate;
    }

    /**
     * @param string $Date
     */
    public function setDate(string $Date): void
    {
        $this->Date = $Date;
    }
}
