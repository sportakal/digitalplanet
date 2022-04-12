<?php

namespace Sportakal\Digitalplanet\Traits;

trait Base64EncodeTrait
{
    /**
     * @param string $data
     * @return string
     */
    private function base64Encode(string $data): string
    {
        return base64_encode($data);
    }
}
