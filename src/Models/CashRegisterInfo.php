<?php

namespace Sportakal\Digitalplanet\Models;

class CashRegisterInfo extends DigitalplanetModel
{
    protected string $ID;
    protected string $zID;
    protected string $SlipID;
    protected string $SlipDate;

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string $zID
     */
    public function setZId(string $zID): void
    {
        $this->zID = $zID;
    }

    /**
     * @param string $SlipID
     */
    public function setSlipId(string $SlipID): void
    {
        $this->SlipID = $SlipID;
    }

    /**
     * @param string $SlipDate
     */
    public function setSlipDate(string $SlipDate): void
    {
        $this->SlipDate = $SlipDate;
    }
}
