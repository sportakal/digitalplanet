<?php

namespace Sportakal\Digitalplanet\Helpers;

class CreateGuid
{
    public static function guid($namespace = '')
    {
        $guid = '';
        $uid = uniqid("", true);
        $data = $namespace;
        $data .= $_SERVER['REQUEST_TIME'] ?? null;
        $data .= $_SERVER['HTTP_USER_AGENT'] ?? null;
        $data .= $_SERVER['LOCAL_ADDR'] ?? null;
        $data .= $_SERVER['LOCAL_PORT'] ?? null;
        $data .= $_SERVER['REMOTE_ADDR'] ?? null;
        $data .= $_SERVER['REMOTE_PORT'] ?? null;
        $hash = strtoupper(hash('ripemd128', $uid . $guid . md5($data)));
        $guid =
            substr($hash, 0, 8) .
            '-' .
            substr($hash, 8, 4) .
            '-' .
            substr($hash, 12, 4) .
            '-' .
            substr($hash, 16, 4) .
            '-' .
            substr($hash, 20, 12);

        return $guid;
    }


}
