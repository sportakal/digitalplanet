<?php

namespace Sportakal\Digitalplanet\Models;

use Sportakal\Digitalplanet\Models\Address;
use Sportakal\Digitalplanet\Models\CommunicationChannels;
use Sportakal\Digitalplanet\Models\Identification;
use Sportakal\Digitalplanet\Models\Person;

class Party extends DigitalplanetModel
{
    protected array $Identifications = ['_key' => 'Identification'];
    protected string $PartyName;
    protected array $Person;
    protected string $WebURL;
    protected array $Address;
    protected array $CommunicationChannels;
    protected string $PartyTaxScheme;

    public function setIdentification(Identification $Identification)
    {
        $this->Identifications[] = $Identification->toArray();
    }

    public function setPartyName(string $PartyName): void
    {
        $this->PartyName = $PartyName;
    }

    public function setPerson(Person $Person): void
    {
        $this->Person = $Person->toArray();
    }

    public function setWebUrl(string $WebURL): void
    {
        $this->WebURL = $WebURL;
    }

    public function setAddress(Address $Address): void
    {
        $this->Address = $Address->toArray();
    }

    public function setCommunicationChannels(CommunicationChannels $CommunicationChannels): void
    {
        $this->CommunicationChannels = $CommunicationChannels->toArray();
    }

    public function setPartyTaxScheme(string $PartyTaxScheme): void
    {
        $this->PartyTaxScheme = $PartyTaxScheme;
    }

}
