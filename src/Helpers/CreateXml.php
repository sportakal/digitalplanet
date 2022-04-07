<?php

namespace Sportakal\Digitalplanet\Helpers;

use DOMDocument;
use DOMElement;

class CreateXml
{
    protected DOMElement $body;
    protected string $xml;
    protected bool $soap = true;


    private DOMDocument $dom;

    public function __construct()
    {
        $this->createDOMDocument();
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
     * @param bool $soap
     */
    public function setSoap(bool $soap): void
    {
        $this->soap = $soap;
    }

    /*
     * @return no-return
     */
    protected function create($type): void
    {
        $dom = $this->dom;

        if ($this->soap) {
            $soap_envelope = $dom->createElement('soap:Envelope');
            $soap_envelope->setAttribute('xmlns:xsi', 'http://www.w3.org/2001/XMLSchema-instance');
            $soap_envelope->setAttribute('xmlns:xsd', 'http://www.w3.org/2001/XMLSchema');
            $soap_envelope->setAttribute('xmlns:soap', 'http://schemas.xmlsoap.org/soap/envelope/');

            $soap_body = $dom->createElement('soap:Body');;

            $soap_body->appendChild($this->body);

            $soap_envelope->appendChild($soap_body);
            $dom->appendChild($soap_envelope);
        } else {
            $dom->appendChild($this->body);
        }


        $this->xml = match ($type) {
            'xml' => $dom->saveXML(),
            'html' => $dom->saveHTML($dom->documentElement),
        };
//        $this->xml = $dom->saveXML();
    }

    public function getDom(): DOMDocument
    {
        return $this->dom;
    }

    public function addBody(DOMElement $body): void
    {
        $this->body = $body;
    }

    public function getXMlString($type = 'xml'): string
    {
        $this->create($type);
        return $this->xml;
    }
}
