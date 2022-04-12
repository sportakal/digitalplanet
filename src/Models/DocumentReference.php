<?php

namespace Sportakal\Digitalplanet\Models;


class DocumentReference extends DigitalplanetModel
{
    protected string $Type;
    protected string $ID;
    protected string $IssueDate;
    protected string $DocumentType;
    protected array $Attachment;

    /**
     * @param string $Type
     */
    public function setType(string $Type): void
    {
        $this->Type = $Type;
    }

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
     * @param string $DocumentType
     */
    public function setDocumentType(string $DocumentType): void
    {
        $this->DocumentType = $DocumentType;
    }

    /**
     * @param Attachment $Attachment
     */
    public function setAttachment(Attachment $Attachment): void
    {
        $this->Attachment = $Attachment->toArray();
    }
}
