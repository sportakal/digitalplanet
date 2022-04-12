<?php

namespace Sportakal\Digitalplanet\Traits;

use Sportakal\Digitalplanet\Utils\XmlCreator;

trait ToXmlTrait
{
    /**
     * Convert object to xml
     * @return string
     */
    public function toHtml(): string
    {
        return (new XmlCreator(get_object_vars($this), false))->getHtml();
    }
}
