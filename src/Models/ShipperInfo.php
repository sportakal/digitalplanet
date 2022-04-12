<?php

namespace Sportakal\Digitalplanet\Models;

class ShipperInfo extends DigitalplanetModel
{
    protected string $PartyName;
    protected string $SendingDate;
    protected array $Identification;

    /**
     * @param string $PartyName
     */
    public function setPartyName(string $PartyName): void
    {
        $this->PartyName = $PartyName;
    }

    /**
     * @param string $SendingDate
     */
    public function setSendingDate(string $SendingDate): void
    {
        $this->SendingDate = $SendingDate;
    }

    /**
     * @param Identification $Identification
     */
    public function setIdentification(Identification $Identification): void
    {
        $this->Identification = $Identification->toArray();
    }
}
