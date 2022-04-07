<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Line implements ElementInterface
{
    protected string $id;
    protected string $note;
    protected array $invoicedQuantity;
    protected array $lineExtensionAmount;
    protected array $allowanceCharge;
    protected array $taxTotal;
    protected array $item;
    protected array $price;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param InvoicedQuantity $invoicedQuantity
     */
    public function setInvoicedQuantity(InvoicedQuantity $invoicedQuantity): void
    {
        $this->invoicedQuantity = $invoicedQuantity->get();
    }

    /**
     * @param Price $lineExtensionAmount
     */
    public function setLineExtensionAmount(Price $lineExtensionAmount): void
    {
        $this->lineExtensionAmount = $lineExtensionAmount->get();
    }

    /**
     * @param AllowanceCharge $allowanceCharge
     */
    public function setAllowanceCharge(AllowanceCharge $allowanceCharge): void
    {
        $this->allowanceCharge = $allowanceCharge->get();
    }

    /**
     * @param TaxTotal $taxTotal
     */
    public function setTaxTotal(TaxTotal $taxTotal): void
    {
        $this->taxTotal = $taxTotal->get();
    }

    /**
     * @param Item $item
     */
    public function setItem(Item $item): void
    {
        $this->item = $item->get();
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price): void
    {
        $this->price = $price->get();
    }

    public function get(): array
    {
        return [
            '_key' => 'Line',
            'ID' => $this->id,
            'Note' => $this->note,
            'InvoicedQuantity' => $this->invoicedQuantity,
            'LineExtensionAmount' => $this->lineExtensionAmount,
            'AllowanceCharge' => $this->allowanceCharge ?? null,
            'TaxTotal' => $this->taxTotal,
            'Item' => $this->item,
            'Price' => $this->price,
        ];
    }
}
