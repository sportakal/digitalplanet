<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;


class Invoice implements ElementInterface
{
    protected array $recipientInfo;
    protected array $senderInfo;
    protected array $invoiceInfo;
    protected array $invoiceLines;
    protected array $taxes;
    protected array $invoiceTotals;
    protected array $orderReference;
    protected array $documentReference;
    protected array $exchangeRate;
    protected array $allowanceCharge;
    protected array $notes;
    protected array $options;
    protected array $eCommerceInfo;
    protected array $cashRegisterInfo;

    /**
     * @param RecipientInfo $receipentInfo
     */
    public function setRecipientInfo(RecipientInfo $recipientInfo): void
    {
        $this->recipientInfo = $recipientInfo->get();
    }

    /**
     * @param SenderInfo $senderInfo
     */
    public function setSenderInfo(SenderInfo $senderInfo): void
    {
        $this->senderInfo = $senderInfo->get();
    }

    /**
     * @param InvoiceInfo $invoiceInfo
     */
    public function setInvoiceInfo(InvoiceInfo $invoiceInfo): void
    {
        $this->invoiceInfo = $invoiceInfo->get();
    }

    /**
     * @param InvoiceLines $invoiceLines
     */
    public function setInvoiceLines(InvoiceLines $invoiceLines): void
    {
        $this->invoiceLines = $invoiceLines->get();
    }

    /**
     * @param Taxes $taxes
     */
    public function setTaxes(Taxes $taxes): void
    {
        $this->taxes = $taxes->get();
    }

    /**
     * @param InvoiceTotals $invoiceTotals
     */
    public function setInvoiceTotals(InvoiceTotals $invoiceTotals): void
    {
        $this->invoiceTotals = $invoiceTotals->get();
    }

    /**
     * @param OrderReference $orderReference
     */
    public function setOrderReference(OrderReference $orderReference): void
    {
        $this->orderReference = $orderReference->get();
    }

    /**
     * @param DocumentReference $documentReference
     */
    public function setDocumentReference(DocumentReference $documentReference): void
    {
        $this->documentReference = $documentReference->get();
    }

    /**
     * @param ExchangeRate $exchangeRate
     */
    public function setExchangeRate(ExchangeRate $exchangeRate): void
    {
        $this->exchangeRate = $exchangeRate->get();
    }

    /**
     * @param AllowanceCharge $allowanceCharge
     */
    public function setAllowanceCharge(AllowanceCharge $allowanceCharge): void
    {
        $this->allowanceCharge = $allowanceCharge->get();
    }

    /**
     * @param Notes $notes
     */
    public function setNotes(Notes $notes): void
    {
        $this->notes = $notes->get();
    }

    /**
     * @param Options $options
     */
    public function setOptions(Options $options): void
    {
        $this->options = $options->get();
    }

    /**
     * @param ECommerceInfo $eCommerceInfo
     */
    public function setECommerceInfo(ECommerceInfo $eCommerceInfo): void
    {
        $this->eCommerceInfo = $eCommerceInfo->get();
    }

    /**
     * @param CashRegisterInfo $cashRegisterInfo
     */
    public function setCashRegisterInfo(CashRegisterInfo $cashRegisterInfo): void
    {
        $this->cashRegisterInfo = $cashRegisterInfo->get();
    }


    public function get()
    {
        return [
            'ReceipentInfo' => $this->recipientInfo,
            'SenderInfo' => $this->senderInfo,
            'InvoiceInfo' => $this->invoiceInfo,
            'InvoiceLines' => $this->invoiceLines,
            'Taxes' => $this->taxes,
            'InvoiceTotals' => $this->invoiceTotals,
            'OrderReference' => $this->orderReference ?? null,
            'DocumentReference' => $this->documentReference ?? null,
            'ExchangeRate' => $this->exchangeRate ?? null,
            'AllowanceCharge' => $this->allowanceCharge ?? null,
            'Notes' => $this->notes ?? null,
            'Options' => $this->options ?? null,
            'eCommerceInfo' => $this->eCommerceInfo ?? null,
            'CashRegisterInfo' => $this->cashRegisterInfo ?? null,
        ];
    }
}
