<?php

namespace Sportakal\Digitalplanet\Models\Documents\Nodes;

class Attachment implements ElementInterface
{
    protected string $mimeCode;
    protected string $encodingCode;
    protected string $characterSetCode;
    protected string $fileName;
    protected string $embeddedDocumentBinaryObject;

    /**
     * @param string $mimeCode
     */
    public function setMimeCode(string $mimeCode): void
    {
        $this->mimeCode = $mimeCode;
    }

    /**
     * @param string $encodingCode
     */
    public function setEncodingCode(string $encodingCode): void
    {
        $this->encodingCode = $encodingCode;
    }

    /**
     * @param string $characterSetCode
     */
    public function setCharacterSetCode(string $characterSetCode): void
    {
        $this->characterSetCode = $characterSetCode;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @param string $embeddedDocumentBinaryObject
     */
    public function setEmbeddedDocumentBinaryObject(string $embeddedDocumentBinaryObject): void
    {
        $this->embeddedDocumentBinaryObject = $embeddedDocumentBinaryObject;
    }


    public function get(): array
    {
        return [
            'MimeCode' => $this->mimeCode,
            'EncodingCode' => $this->encodingCode,
            'CharacterSetCode' => $this->characterSetCode,
            'FileName' => $this->fileName ?? null,
            'EmbeddedDocumentBinaryObject' => $this->embeddedDocumentBinaryObject
        ];
    }


}
