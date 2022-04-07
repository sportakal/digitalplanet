<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;


class Reference implements ElementInterface
{
    protected string $id;
    protected string $issueDate;
    protected string $documentType;
    protected array $attachment;

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
     * @param string $documentType
     */
    public function setDocumentType(string $documentType): void
    {
        $this->documentType = $documentType;
    }

    /**
     * @param Attachment $attachment
     */
    public function setAttachment(Attachment $attachment): void
    {
        $this->attachment = $attachment->get();
    }


    public function get(): array
    {
        return [
            'ID' => $this->id,
            'IssueDate' => $this->issueDate,
            'DocumentType' => $this->documentType ?? null,
            'Attachment' => $this->attachment ?? null,
        ];
    }


}
