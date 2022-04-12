<?php

namespace Sportakal\Digitalplanet\Models;

use Sportakal\Digitalplanet\Traits\ToArrayTrait;

class Attachment extends DigitalplanetModel
{
    protected string $MimeCode;
    protected string $EncodingCode;
    protected string $CharacterSetCode;
    protected string $FileName;
    protected string $EmbeddedDocumentBinaryObject;

    /**
     * @param string $MimeCode
     */
    public function setMimeCode(string $MimeCode): void
    {
        $this->MimeCode = $MimeCode;
    }

    /**
     * @param string $EncodingCode
     */
    public function setEncodingCode(string $EncodingCode): void
    {
        $this->EncodingCode = $EncodingCode;
    }

    /**
     * @param string $CharacterSetCode
     */
    public function setCharacterSetCode(string $CharacterSetCode): void
    {
        $this->CharacterSetCode = $CharacterSetCode;
    }

    /**
     * @param string $FileName
     */
    public function setFileName(string $FileName): void
    {
        $this->FileName = $FileName;
    }

    /**
     * @param string $EmbeddedDocumentBinaryObject
     */
    public function setEmbeddedDocumentBinaryObject(string $EmbeddedDocumentBinaryObject): void
    {
        $this->EmbeddedDocumentBinaryObject = $EmbeddedDocumentBinaryObject;
    }
}
