<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class InvoicePeriod implements ElementInterface
{
    protected string $startDate;
    protected string $endDate;
    protected string $description;
    protected array $durationMeasure;

    /**
     * @param string $startDate
     */
    public function setStartDate(string $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate(string $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param DurationMeasure $durationMeasure
     */
    public function setDurationMeasure(DurationMeasure $durationMeasure): void
    {
        $this->durationMeasure = $durationMeasure->get();
    }


    public function get(): array
    {
        return [
            'StartDate' => $this->startDate,
            'EndDate' => $this->endDate,
            'DurationMeasure' => $this->durationMeasure,
            'Description' => $this->description
        ];
    }


}
