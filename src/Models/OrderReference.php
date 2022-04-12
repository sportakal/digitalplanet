<?php

namespace Sportakal\Digitalplanet\Models;


class OrderReference extends DigitalplanetModel
{
    protected string $ID;
    protected string $IssueDate;
    protected array $Reference;

    /**
     * @param string $ID
     */
    public function setId(string $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @param string $IssueDate
     */
    public function setIssueDate(string $IssueDate): void
    {
        $this->IssueDate = $IssueDate;
    }

    /**
     * @param Reference $Reference
     */
    public function setReference(Reference $Reference): void
    {
        $this->Reference = $Reference->toArray();
    }
}
