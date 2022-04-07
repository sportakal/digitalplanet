<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;


class OrderReference implements ElementInterface
{
    protected string $id;
    protected string $issueDate;
    protected array $reference;

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $issueDate
     */
    public function setIssueDate(string $issueDate): void
    {
        $this->issueDate = $issueDate;
    }

    /**
     * @param Reference $reference
     */
    public function setReference(Reference $reference): void
    {
        $this->reference = $reference->get();
    }


    public function get(): array
    {
        return [
            'ID' => $this->id,
            'IssueDate' => $this->issueDate,
            'Reference' => $this->reference ?? null,
        ];
    }


}
