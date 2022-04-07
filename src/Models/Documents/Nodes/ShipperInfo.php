<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class ShipperInfo implements ElementInterface
{
    protected string $partyName;
    protected string $sendingDate;
    protected array $identification;

    /**
     * @param string $partyName
     */
    public function setPartyName(string $partyName): void
    {
        $this->partyName = $partyName;
    }

    /**
     * @param string $sendingDate
     */
    public function setSendingDate(string $sendingDate): void
    {
        $this->sendingDate = $sendingDate;
    }

    /**
     * @param Identification $identification
     */
    public function setIdentification(Identification $identification): void
    {
        $this->identification = $identification->get();
    }


    public function get(): array
    {
        return [
            'PartyName' => $this->partyName,
            'SendingDate' => $this->sendingDate,
            'Identification' => $this->identification
        ];
    }


}
