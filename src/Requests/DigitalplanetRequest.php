<?php

namespace Sportakal\Digitalplanet\Requests;

use Sportakal\Digitalplanet\Traits\ToArrayTrait;

class DigitalplanetRequest implements RequestInterface
{
    use ToArrayTrait;

    /**
     * @return bool
     */
    public function requiresAuthentication(): bool
    {
        return true;
    }
}
