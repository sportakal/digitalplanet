<?php

namespace Sportakal\Digitalplanet\Models;

class RecipientInfo extends Party
{
    protected array $AgentParty;

    public function setAgentParty(AgentParty $AgentParty): void
    {
        $this->AgentParty = $AgentParty->toArray();
    }
}
