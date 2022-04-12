<?php

namespace Sportakal\Digitalplanet\Models;

class SenderInfo extends Party
{
    protected array $AgentParty;

    public function setAgentParty(AgentParty $AgentParty): void
    {
        $this->AgentParty = $AgentParty->toArray();
    }
}
