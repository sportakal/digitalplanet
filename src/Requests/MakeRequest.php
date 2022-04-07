<?php

namespace Sportakal\Digitalplanet\Requests;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Sportakal\Digitalplanet\Helpers\CreateNode;
use Sportakal\Digitalplanet\Helpers\CreateXml;
use Sportakal\Digitalplanet\Responses\Response;
use Sportakal\Digitalplanet\Digitalplanet;

class MakeRequest
{
    protected bool $require_ticket = true;

    protected Digitalplanet $options;
    protected string $SOAPAction;
    protected $xml_string;
    protected string $nodeName;
    protected array $nodeValue;

    protected function getOptions(): Digitalplanet
    {
        if (empty($this->options)) {
            $this->options = new Digitalplanet();
        }

        return $this->options;
    }

    /**
     * @param Digitalplanet $options
     */
    public function setOptions(Digitalplanet $options): void
    {
        $this->options = $options;
    }

    protected array $nodeAttributes;

    protected function getXML(): string
    {
        if ($this->require_ticket) {
            $this->nodeValue = ['Ticket' => $this->getOptions()->getTicket()] + $this->nodeValue;
            $this->nodeValue = ['ticket' => $this->getOptions()->getTicket()] + $this->nodeValue;
        }

        $createXML = new CreateXml();
        $dom = $createXML->getDom();
        $node = new CreateNode($dom, $this->nodeName, $this->nodeValue, $this->nodeAttributes);
        $node = $node->getNode();
        $createXML->addBody($node);

        return $createXML->getXMlString();

    }

    public function send($debug = false): Response
    {
        $this->xml_string = $this->getXML();
//        if ($debug) {
//            dd($this->xml_string);
//        }

        $response = Http::post($this->getOptions()->getUrl(), [
            'headers' => [
                'Content-Type' => 'text/xml; charset=utf-8',
                'SOAPAction' => $this->SOAPAction,
            ],
            'body' => $this->xml_string
        ]);

//        if ($debug) {
//            dd($response);
//        }

        return (new Response($response, $this->nodeName));
    }
}
