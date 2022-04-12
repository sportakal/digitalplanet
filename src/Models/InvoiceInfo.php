<?php

namespace Sportakal\Digitalplanet\Models;

class InvoiceInfo extends DigitalplanetModel
{
    protected string $InvoiceID;
    protected int $LineCount;
    protected string $Scenario;
    protected string $IssueDate;
    protected string $IssueTime;
    protected string $InvoiceTypeCode;
    protected string $CopyIndicator;
    protected string $UUID;
    protected array $Currency;
    protected array $InvoicePeriod;
    protected array $PaymentMeans;
    protected array $PaymentTerms;
    protected string $Alias;
    protected string $SendingType;

    /**
     * @param string $InvoiceID
     */
    public function setInvoiceId(string $InvoiceID): void
    {
        $this->InvoiceID = $InvoiceID;
    }

    /**
     * @param int $LineCount
     */
    public function setLineCount(int $LineCount): void
    {
        $this->LineCount = $LineCount;
    }

    /**
     * @param string $Scenario
     */
    public function setScenario(string $Scenario): void
    {
        $this->Scenario = $Scenario;
    }

    /**
     * @param string $IssueDate
     */
    public function setIssueDate(string $IssueDate): void
    {
        $this->IssueDate = $IssueDate;
    }

    /**
     * @param string $IssueTime
     */
    public function setIssueTime(string $IssueTime): void
    {
        $this->IssueTime = $IssueTime;
    }

    /**
     * @param string $InvoiceTypeCode
     */
    public function setInvoiceTypeCode(string $InvoiceTypeCode): void
    {
        $this->InvoiceTypeCode = $InvoiceTypeCode;
    }

    /**
     * @param string $CopyIndicator
     */
    public function setCopyIndicator(string $CopyIndicator): void
    {
        $this->CopyIndicator = $CopyIndicator;
    }

    /**
     * @param string $UUID
     */
    public function setUuid(string $UUID): void
    {
        $this->UUID = $UUID;
    }

    /**
     * @param Currency $Currency
     */
    public function setCurrency(Currency $Currency): void
    {
        $this->Currency = $Currency->toArray();
    }

    /**
     * @param InvoicePeriod $InvoicePeriod
     */
    public function setInvoicePeriod(InvoicePeriod $InvoicePeriod): void
    {
        $this->InvoicePeriod = $InvoicePeriod->toArray();
    }

    /**
     * @param PaymentMeans $PaymentMeans
     */
    public function setPaymentMeans(PaymentMeans $PaymentMeans): void
    {
        $this->PaymentMeans = $PaymentMeans->toArray();
    }

    /**
     * @param PaymentTerms $PaymentTerms
     */
    public function setPaymentTerms(PaymentTerms $PaymentTerms): void
    {
        $this->PaymentTerms = $PaymentTerms->toArray();
    }

    /**
     * @param string $Alias
     */
    public function setAlias(string $Alias): void
    {
        $this->Alias = $Alias;
    }

    /**
     * @param string $SendingType
     */
    public function setSendingType(string $SendingType): void
    {
        $this->SendingType = $SendingType;
    }
}
