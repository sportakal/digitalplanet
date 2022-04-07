<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class CashRegisterInfo implements ElementInterface
{
    protected string $id;
    protected string $zId;
    protected string $slipId;
    protected string $slipDate;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $zId
     */
    public function setZId(string $zId): void
    {
        $this->zId = $zId;
    }

    /**
     * @param string $slipId
     */
    public function setSlipId(string $slipId): void
    {
        $this->slipId = $slipId;
    }

    /**
     * @param string $slipDate
     */
    public function setSlipDate(string $slipDate): void
    {
        $this->slipDate = $slipDate;
    }


    public function get(): array
    {
        return [
            'ID' => $this->id,
            'zID' => $this->zId,
            'SlipID' => $this->slipId,
            'SlipDate' => $this->slipDate
        ];
    }


}
