<?php

namespace Sportakal\Digitalplanet\Models;

class ECommerceInfo extends DigitalplanetModel
{
    protected string $WebURL;
    protected string $PaymentAgentName;
    protected array $ShipperInfo;

    /**
     * @param string $WebURL
     */
    public function setWebUrl(string $WebURL): void
    {
        $this->WebURL = $WebURL;
    }

    /**
     * @param string $PaymentAgentName
     */
    public function setPaymentAgentName(string $PaymentAgentName): void
    {
        $this->PaymentAgentName = $PaymentAgentName;
    }

    /**
     * @param ShipperInfo $ShipperInfo
     */
    public function setShipperInfo(ShipperInfo $ShipperInfo): void
    {
        $this->ShipperInfo = $ShipperInfo->toArray();
    }
}
