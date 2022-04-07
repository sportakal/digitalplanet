<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class InvoiceInfo implements ElementInterface
{
    protected string $invoiceId;
    protected int $lineCount;
    protected string $scenario;
    protected string $issueDate;
    protected string $issueTime;
    protected string $invoiceTypeCode;
    protected string $copyIndicator;
    protected string $uuid;
    protected array $currency;
    protected array $invoicePeriod;
    protected array $paymentMeans;
    protected array $paymentTerms;
    protected string $alias;
    protected string $sendingType;

    /**
     * @param string $invoiceId
     */
    public function setInvoiceId(string $invoiceId): void
    {
        $this->invoiceId = $invoiceId;
    }

    /**
     * @param int $lineCount
     */
    public function setLineCount(int $lineCount): void
    {
        $this->lineCount = $lineCount;
    }

    /**
     * @param string $scenario
     */
    public function setScenario(string $scenario): void
    {
        $this->scenario = $scenario;
    }

    /**
     * @param string $issueDate
     */
    public function setIssueDate(string $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @param string $issueTime
     */
    public function setIssueTime(string $issueTime): void
    {
        $this->issueTime = $issueTime;
    }

    /**
     * @param string $invoiceTypeCode
     */
    public function setInvoiceTypeCode(string $invoiceTypeCode): void
    {
        $this->invoiceTypeCode = $invoiceTypeCode;
    }

    /**
     * @param string $copyIndicator
     */
    public function setCopyIndicator(string $copyIndicator): void
    {
        $this->copyIndicator = $copyIndicator;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency->get();
    }

    /**
     * @param InvoicePeriod $invoicePeriod
     */
    public function setInvoicePeriod(InvoicePeriod $invoicePeriod): void
    {
        $this->invoicePeriod = $invoicePeriod->get();
    }

    /**
     * @param PaymentMeans $paymentMeans
     */
    public function setPaymentMeans(PaymentMeans $paymentMeans): void
    {
        $this->paymentMeans = $paymentMeans->get();
    }

    /**
     * @param PaymentTerms $paymentTerms
     */
    public function setPaymentTerms(PaymentTerms $paymentTerms): void
    {
        $this->paymentTerms = $paymentTerms->get();
    }

    /**
     * @param string $alias
     */
    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }

    /**
     * @param string $sendingType
     */
    public function setSendingType(string $sendingType): void
    {
        $this->sendingType = $sendingType;
    }


    public function get()
    {
        return [
            'InvoiceID' => $this->invoiceId,
            'LineCount' => $this->lineCount,
            'Scenario' => $this->scenario,
            'IssueDate' => $this->issueDate,
            'IssueTime' => $this->issueTime,
            'InvoiceTypeCode' => $this->invoiceTypeCode,
            'CopyIndicator' => $this->copyIndicator ?? 'false',
            'UUID' => $this->uuid,
            'Currency' => $this->currency,
            'InvoicePeriod' => $this->invoicePeriod ?? null,
            'PaymentMeans' => $this->paymentMeans ?? null,
            'PaymentTerms' => $this->paymentTerms ?? null,
            'Alias' => $this->alias,
            'SendingType' => $this->sendingType ?? null,
        ];

    }
}
