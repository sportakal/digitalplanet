<?php

namespace Sportakal\Digitalplanet\Models\Documents;

use Sportakal\Digitalplanet\Helpers\CreateNode;
use Sportakal\Digitalplanet\Helpers\CreateXml;
use Sportakal\Digitalplanet\Models\Documents\Nodes\Invoice;

class Invoices
{
    protected string $version = '2.1';
    protected array $invoice;

    public function __construct(Invoice $invoice, $version = null)
    {
        $this->invoice = $invoice->get();
        if ($version) {
            $this->version = $version;
        }
    }

    /*
     * @return CreateXml
     */
    protected function makeXML(): CreateXml
    {
        $xml = new CreateXml();
        $xml->setSoap(false);
        $dom = $xml->getDom();

        $node = new CreateNode($dom, 'Invoices', $this->get());
        $xml->addBody($node->getNode());
        return $xml;
    }


    public function getXML()
    {
        return $this->makeXML()->getXMlString('html');
    }

    public function get()
    {
        return [
            'Version' => $this->version,
            'Invoice' => $this->invoice,
        ];
    }
}
