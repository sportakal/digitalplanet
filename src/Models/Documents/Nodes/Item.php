<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Item implements ElementInterface
{
    protected string $description;
    protected string $name;
    protected string $brandName;
    protected string $modelName;
    protected string $buyersItemIdentification;
    protected string $sellersItemIdentification;
    protected string $manufacturersItemIdentification;
    protected string $comodityClassification;

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $brandName
     */
    public function setBrandName(string $brandName): void
    {
        $this->brandName = $brandName;
    }

    /**
     * @param string $modelName
     */
    public function setModelName(string $modelName): void
    {
        $this->modelName = $modelName;
    }

    /**
     * @param string $buyersItemIdentification
     */
    public function setBuyersItemIdentification(string $buyersItemIdentification): void
    {
        $this->buyersItemIdentification = $buyersItemIdentification;
    }

    /**
     * @param string $sellersItemIdentification
     */
    public function setSellersItemIdentification(string $sellersItemIdentification): void
    {
        $this->sellersItemIdentification = $sellersItemIdentification;
    }

    /**
     * @param string $manufacturersItemIdentification
     */
    public function setManufacturersItemIdentification(string $manufacturersItemIdentification): void
    {
        $this->manufacturersItemIdentification = $manufacturersItemIdentification;
    }

    /**
     * @param string $comodityClassification
     */
    public function setComodityClassification(string $comodityClassification): void
    {
        $this->comodityClassification = $comodityClassification;
    }


    public function get(): array
    {
        return [
            'Name' => $this->name,
            'Description' => $this->description ?? null,
            'BrandName' => $this->brandName ?? null,
            'ModelName' => $this->modelName ?? null,
            'BuyersItemIdentification' => $this->buyersItemIdentification ?? null,
            'SellersItemIdentification' => $this->sellersItemIdentification ?? null,
            'ManufacturersItemIdentification' => $this->manufacturersItemIdentification ?? null,
            'CommodityClassification' => $this->comodityClassification ?? null,
        ];
    }


}
