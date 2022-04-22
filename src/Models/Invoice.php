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
    protected array $Options2;
    protected array $Options3;
    protected array $Options4;
    protected array $Options5;
    protected array $Options6;
    protected array $Options7;
    protected array $Options8;
    protected array $Options9;
    protected array $Options10;
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
     * @param Options $Options2
     */
    public function setOptions2(Options $Options2): void
    {
        $this->Options2 = $Options2->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options3
     */
    public function setOptions3(Options $Options3): void
    {
        $this->Options3 = $Options3->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options4
     */
    public function setOptions4(Options $Options4): void
    {
        $this->Options4 = $Options4->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options5
     */
    public function setOptions5(Options $Options5): void
    {
        $this->Options5 = $Options5->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options6
     */
    public function setOptions6(Options $Options6): void
    {
        $this->Options6 = $Options6->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options7
     */
    public function setOptions7(Options $Options7): void
    {
        $this->Options7 = $Options7->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options8
     */
    public function setOptions8(Options $Options8): void
    {
        $this->Options8 = $Options8->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options9
     */
    public function setOptions9(Options $Options9): void
    {
        $this->Options9 = $Options9->toArray() + ['_parent_key' => 'Options'];
    }

    /**
     * @param Options $Options10
     */
    public function setOptions10(Options $Options10): void
    {
        $this->Options10 = $Options10->toArray() + ['_parent_key' => 'Options'];
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
