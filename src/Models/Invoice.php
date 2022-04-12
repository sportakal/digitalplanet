<?php

namespace Sportakal\Digitalplanet\Models;


class Invoice extends DigitalplanetModel
{
    protected array $ReceipentInfo;
    protected array $SenderInfo;
    protected array $InvoiceInfo;
    protected array $InvoiceLines;
    protected array $Taxes;
    protected array $InvoiceTotals;
    protected array $OrderReference;
    protected array $DocumentReference;
    protected array $ExchangeRate;
    protected array $AllowanceCharge;
    protected array $Notes;
    protected array $Options;
    protected array $eCommerceInfo;
    protected array $CashRegisterInfo;

    /**
     * @param RecipientInfo $receipentInfo
     */
    public function setRecipientInfo(RecipientInfo $ReceipentInfo): void
    {
        $this->ReceipentInfo = $ReceipentInfo->toArray();
    }

    /**
     * @param SenderInfo $SenderInfo
     */
    public function setSenderInfo(SenderInfo $SenderInfo): void
    {
        $this->SenderInfo = $SenderInfo->toArray();
    }

    /**
     * @param InvoiceInfo $InvoiceInfo
     */
    public function setInvoiceInfo(InvoiceInfo $InvoiceInfo): void
    {
        $this->InvoiceInfo = $InvoiceInfo->toArray();
    }

    /**
     * @param InvoiceLines $InvoiceLines
     */
    public function setInvoiceLines(InvoiceLines $InvoiceLines): void
    {
        $this->InvoiceLines = $InvoiceLines->toArray();
    }

    /**
     * @param Taxes $Taxes
     */
    public function setTaxes(Taxes $Taxes): void
    {
        $this->Taxes = $Taxes->toArray();
    }

    /**
     * @param InvoiceTotals $InvoiceTotals
     */
    public function setInvoiceTotals(InvoiceTotals $InvoiceTotals): void
    {
        $this->InvoiceTotals = $InvoiceTotals->toArray();
    }

    /**
     * @param OrderReference $OrderReference
     */
    public function setOrderReference(OrderReference $OrderReference): void
    {
        $this->OrderReference = $OrderReference->toArray();
    }

    /**
     * @param DocumentReference $DocumentReference
     */
    public function setDocumentReference(DocumentReference $DocumentReference): void
    {
        $this->DocumentReference = $DocumentReference->toArray();
    }

    /**
     * @param ExchangeRate $ExchangeRate
     */
    public function setExchangeRate(ExchangeRate $ExchangeRate): void
    {
        $this->ExchangeRate = $ExchangeRate->toArray();
    }

    /**
     * @param AllowanceCharge $AllowanceCharge
     */
    public function setAllowanceCharge(AllowanceCharge $AllowanceCharge): void
    {
        $this->AllowanceCharge = $AllowanceCharge->toArray();
    }

    /**
     * @param Notes $Notes
     */
    public function setNotes(Notes $Notes): void
    {
        $this->Notes = $Notes->toArray();
    }

    /**
     * @param Options $Options
     */
    public function setOptions(Options $Options): void
    {
        $this->Options = $Options->toArray();
    }

    /**
     * @param ECommerceInfo $eCommerceInfo
     */
    public function setECommerceInfo(ECommerceInfo $eCommerceInfo): void
    {
        $this->eCommerceInfo = $eCommerceInfo->toArray();
    }

    /**
     * @param CashRegisterInfo $CashRegisterInfo
     */
    public function setCashRegisterInfo(CashRegisterInfo $CashRegisterInfo): void
    {
        $this->CashRegisterInfo = $CashRegisterInfo->toArray();
    }
}
