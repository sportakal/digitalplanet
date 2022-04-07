<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;


class DocumentReference implements ElementInterface
{
    protected string $type;
    protected string $id;
    protected string $issueDate;
    protected string $documentType;
    protected array $attachment;

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

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
            'Type' => $this->type,
            'ID' => $this->id,
            'IssueDate' => $this->issueDate,
            'DocumentType' => $this->documentType,
            'Attachment' => $this->attachment,
        ];
    }


}
