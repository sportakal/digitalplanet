<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class AgentParty extends Party implements ElementInterface
{
    public function get(): array
    {
        return [
            'Identifications' => $this->identifications,
            'PartyName' => $this->partyName,
            'Person' => $this->person ?? null,
            'WebURL' => $this->webUrl,
            'Address' => $this->address,
            'CommunicationChannels' => $this->communicationChannels,
            'PartyTaxScheme' => $this->partyTaxScheme,
        ];
    }
}
