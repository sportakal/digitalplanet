<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

use Sportakal\Digitalplanet\Models\Documents\Nodes\Address;
use Sportakal\Digitalplanet\Models\Documents\Nodes\CommunicationChannels;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Identification;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Person;

class Party
{
    protected array $identifications;
    protected string $partyName;
    protected array $person;
    protected string $webUrl;
    protected array $address;
    protected array $communicationChannels;
    protected string $partyTaxScheme;

    public function setIdentification(Identification $identification)
    {
        $this->identifications[] = $identification->get();
    }

    public function setPartyName(string $partyName): void
    {
        $this->partyName = $partyName;
    }

    public function setPerson(Person $person): void
    {
        $this->person = $person->get();
    }

    public function setWebUrl(string $webUrl): void
    {
        $this->webUrl = $webUrl;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address->get();
    }

    public function setCommunicationChannels(CommunicationChannels $communicationChannels): void
    {
        $this->communicationChannels = $communicationChannels->get();
    }

    public function setPartyTaxScheme(string $partyTaxScheme): void
    {
        $this->partyTaxScheme = $partyTaxScheme;
    }

}
