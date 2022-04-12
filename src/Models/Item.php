<?php

namespace Sportakal\Digitalplanet\Models;

class Item extends DigitalplanetModel
{
    protected string $Description;
    protected string $Name;
    protected string $BrandName;
    protected string $ModelName;
    protected string $BuyersItemIdentification;
    protected string $SellersItemIdentification;
    protected string $ManufacturersItemIdentification;
    protected string $CommodityClassification;

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @param string $Name
     */
    public function setName(string $Name): void
    {
        $this->Name = $Name;
    }

    /**
     * @param string $BrandName
     */
    public function setBrandName(string $BrandName): void
    {
        $this->BrandName = $BrandName;
    }

    /**
     * @param string $ModelName
     */
    public function setModelName(string $ModelName): void
    {
        $this->ModelName = $ModelName;
    }

    /**
     * @param string $BuyersItemIdentification
     */
    public function setBuyersItemIdentification(string $BuyersItemIdentification): void
    {
        $this->BuyersItemIdentification = $BuyersItemIdentification;
    }

    /**
     * @param string $SellersItemIdentification
     */
    public function setSellersItemIdentification(string $SellersItemIdentification): void
    {
        $this->SellersItemIdentification = $SellersItemIdentification;
    }

    /**
     * @param string $ManufacturersItemIdentification
     */
    public function setManufacturersItemIdentification(string $ManufacturersItemIdentification): void
    {
        $this->ManufacturersItemIdentification = $ManufacturersItemIdentification;
    }

    /**
     * @param string $CommodityClassification
     */
    public function setComodityClassification(string $CommodityClassification): void
    {
        $this->CommodityClassification = $CommodityClassification;
    }
}
