<?php

namespace Sportakal\Digitalplanet\Models;

class Line extends DigitalplanetModel
{
    protected string $ID;
    protected string $Note;
    protected array $InvoicedQuantity;
    protected array $LineExtensionAmount;
    protected array $AllowanceCharge;
    protected array $TaxTotal;
    protected array $Item;
    protected array $Price;

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string $Note
     */
    public function setNote(string $Note): void
    {
        $this->Note = $Note;
    }

    /**
     * @param InvoicedQuantity $InvoicedQuantity
     */
    public function setInvoicedQuantity(InvoicedQuantity $InvoicedQuantity): void
    {
        $this->InvoicedQuantity = $InvoicedQuantity->toArray();
    }

    /**
     * @param Price $LineExtensionAmount
     */
    public function setLineExtensionAmount(Price $LineExtensionAmount): void
    {
        $this->LineExtensionAmount = $LineExtensionAmount->toArray();
    }

    /**
     * @param AllowanceCharge $AllowanceCharge
     */
    public function setAllowanceCharge(AllowanceCharge $AllowanceCharge): void
    {
        $this->AllowanceCharge = $AllowanceCharge->toArray();
    }

    /**
     * @param TaxTotal $TaxTotal
     */
    public function setTaxTotal(TaxTotal $TaxTotal): void
    {
        $this->TaxTotal = $TaxTotal->toArray();
    }

    /**
     * @param Item $Item
     */
    public function setItem(Item $Item): void
    {
        $this->Item = $Item->toArray();
    }

    /**
     * @param Price $Price
     */
    public function setPrice(Price $Price): void
    {
        $this->Price = $Price->toArray();
    }
}
