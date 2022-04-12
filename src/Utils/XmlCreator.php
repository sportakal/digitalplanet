<?php

namespace Sportakal\Digitalplanet\Utils;

use DOMDocument;
use DOMElement;

class XmlCreator
{
    protected array $data;
    protected bool $soap = true;
    private DOMDocument $dom;

    public function __construct(array $data, $soap = true)
    {
        $this->data = $data;
        $this->soap = $soap;

        $this->createDOMDocument();

        $body = $this->dom;
        if ($this->soap) {
            $body = $this->addSoapElements();
        }
        $this->createNode($this->dom, $body, $this->data);
    }

    private function createDOMDocument(): void
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->encoding = 'UTF-8';
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $this->dom = $dom;
    }

    /**
     * @return DOMElement|bool
     * @throws \DOMException
     */
    protected function addSoapElements(): DOMElement|bool
    {
        $dom = $this->dom;

        $soap_envelope = $dom->createElement('soap:Envelope');
        $soap_envelope->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
        $soap_envelope->setAttribute('xmlns:xsd', 'http://www.w3.org/2001/XMLSchema');
        $soap_envelope->setAttribute('xmlns:soap', 'http://schemas.xmlsoap.org/soap/envelope/');

        $soap_body = $dom->createElement('soap:Body');;
        $soap_envelope->appendChild($soap_body);
        $dom->appendChild($soap_envelope);

        return $soap_body;
    }

    /**
     * @throws \DOMException
     */
    private function createNode(DOMDocument $dom, DOMElement|DOMDocument $parent, array $data): void
    {
        foreach ($data as $key => $value) {
            if (str_starts_with($key, '_')) {
                continue;
            }

            if (!$key || is_int($key)) {
                $key = $data['_key'] ?? null;
            }

            if (!$key) {
                $parent->nodeValue = htmlspecialchars($value);
                continue;
            }

            $parentNode = $dom->createElement($key);
            foreach ($value['_attributes'] ?? [] as $attribute => $attributeValue) {
                $parentNode->setAttribute($attribute, $attributeValue);
            }
            $parent->appendChild($parentNode);
            if (!is_array($value)) {
                $parentNode->nodeValue = htmlspecialchars($value);
                continue;
            }

            $this->createNode($dom, $parentNode, $value);
        }
    }

    public function getXml(): string
    {
        return $this->dom->saveXML();
    }

    public function getHtml(): string
    {
        return $this->dom->saveHTML($this->dom->documentElement);
    }
}
