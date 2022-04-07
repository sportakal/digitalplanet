<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class SenderInfo extends Party implements ElementInterface
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
            'PartyName' => $this->partyName,
            'Person' => $this->person ?? null,
            'WebURL' => $this->webUrl,
            'Address' => $this->address,
            'CommunicationChannels' => $this->communicationChannels,
            'PartyTaxScheme' => $this->partyTaxScheme,
            'AgentParty' => $this->agentParty ?? null,
        ];
    }
}
