<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class ECommerceInfo implements ElementInterface
{
    protected string $webUrl;
    protected string $paymentAgentName;
    protected array $shipperInfo;

    /**
     * @param string $webUrl
     */
    public function setWebUrl(string $webUrl): void
    {
        $this->webUrl = $webUrl;
    }

    /**
     * @param string $paymentAgentName
     */
    public function setPaymentAgentName(string $paymentAgentName): void
    {
        $this->paymentAgentName = $paymentAgentName;
    }

    /**
     * @param ShipperInfo $shipperInfo
     */
    public function setShipperInfo(ShipperInfo $shipperInfo): void
    {
        $this->shipperInfo = $shipperInfo->get();
    }


    public function get(): array
    {
        return [
            'WebURL' => $this->webUrl,
            'PaymentAgentName' => $this->paymentAgentName,
            'ShipperInfo' => $this->shipperInfo
        ];
    }


}
