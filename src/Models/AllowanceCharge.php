<?php

namespace Sportakal\Digitalplanet\Models;

use Sportakal\Digitalplanet\Traits\ToArrayTrait;

class AllowanceCharge extends DigitalplanetModel
{
    protected string $ChargeIndicator; //Enter false if discount and true if increment.
    protected string $AllowanceChargeReason;
    protected float $MultiplierFactorNumeric;
    protected array $ChargeAmount;
    protected array $BaseAmount;

    /**
     * @param bool $ChargeIndicator
     */
    public function setChargeIndicator(bool $ChargeIndicator): void
    {
        $this->ChargeIndicator = $ChargeIndicator ? 'true' : 'false';
    }

    /**
     * @param string $AllowanceChargeReason
     */
    public function setAllowanceChargeReason(string $AllowanceChargeReason): void
    {
        $this->AllowanceChargeReason = $AllowanceChargeReason;
    }

    /**
     * @param float $MultiplierFactorNumeric
     */
    public function setMultiplierFactorNumeric(float $MultiplierFactorNumeric): void
    {
        $this->MultiplierFactorNumeric = $MultiplierFactorNumeric;
    }

    /**
     * @param Price $ChargeAmount
     */
    public function setChargeAmount(Price $ChargeAmount): void
    {
        $this->ChargeAmount = $ChargeAmount->toArray();
    }

    /**
     * @param Price $BaseAmount
     */
    public function setBaseAmount(Price $BaseAmount): void
    {
        $this->BaseAmount = $BaseAmount->toArray();
    }
}
