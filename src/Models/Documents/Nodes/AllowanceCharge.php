<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class AllowanceCharge implements ElementInterface
{
    protected string $chargeIndicator; //Enter false if discount and true if increment.
    protected string $allowanceChargeReason;
    protected float $multiplierFactorNumeric;
    protected array $chargeAmount;
    protected array $baseAmount;

    /**
     * @param bool $chargeIndicator
     */
    public function setChargeIndicator(bool $chargeIndicator): void
    {
        $this->chargeIndicator = $chargeIndicator ? 'true' : 'false';
    }

    /**
     * @param string $allowanceChargeReason
     */
    public function setAllowanceChargeReason(string $allowanceChargeReason): void
    {
        $this->allowanceChargeReason = $allowanceChargeReason;
    }

    /**
     * @param float $multiplierFactorNumeric
     */
    public function setMultiplierFactorNumeric(float $multiplierFactorNumeric): void
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
    }

    /**
     * @param Price $chargeAmount
     */
    public function setChargeAmount(Price $chargeAmount): void
    {
        $this->chargeAmount = $chargeAmount->get();
    }

    /**
     * @param Price $baseAmount
     */
    public function setBaseAmount(Price $baseAmount): void
    {
        $this->baseAmount = $baseAmount->get();
    }


    public function get(): array
    {
        return [
            'ChargeIndicator' => $this->chargeIndicator,
            'AllowanceChargeReason' => $this->allowanceChargeReason,
            'MultiplierFactorNumeric' => $this->multiplierFactorNumeric,
            'ChargeAmount' => $this->chargeAmount,
            'BaseAmount' => $this->baseAmount
        ];
    }


}
