<?php

namespace Sportakal\Digitalplanet\Requests;

interface RequestInterface
{
    public function toArray(): array;

    public function requiresAuthentication(): bool;
}
