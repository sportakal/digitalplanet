<?php

namespace Sportakal\Digitalplanet\Models;

class InvoicePeriod extends DigitalplanetModel
{
    protected string $StartDate;
    protected string $EndDate;
    protected string $Description;
    protected array $DurationMeasure;

    /**
     * @param string $StartDate
     */
    public function setStartDate(string $StartDate): void
    {
        $this->StartDate = $StartDate;
    }

    /**
     * @param string $EndDate
     */
    public function setEndDate(string $EndDate): void
    {
        $this->EndDate = $EndDate;
    }

    /**
     * @param string $Description
     */
    public function setDescription(string $Description): void
    {
        $this->Description = $Description;
    }

    /**
     * @param DurationMeasure $DurationMeasure
     */
    public function setDurationMeasure(DurationMeasure $DurationMeasure): void
    {
        $this->DurationMeasure = $DurationMeasure->toArray();
    }
}
