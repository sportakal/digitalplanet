<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class RecipientInfo extends Party implements ElementInterface
{
    protected array $agentParty;

    public function setAgentParty(AgentParty $agentParty): void
    {
        $this->agentParty = $agentParty->get();
    }

    public function get()
    {
        return [
            'Identifications' => $this->identifications,
            'PartyName' => $this->partyName ?? null,
            'Person' => $this->person ?? null,
            'WebURL' => $this->webUrl ?? null,
            'Address' => $this->address,
            'CommunicationChannels' => $this->communicationChannels,
            'PartyTaxScheme' => $this->partyTaxScheme,
            'AgentParty' => $this->agentParty ?? null,
        ];

    }
}
