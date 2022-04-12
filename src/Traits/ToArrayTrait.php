<?php

namespace Sportakal\Digitalplanet\Traits;

trait ToArrayTrait
{
    /**
     * Convert object to array
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
