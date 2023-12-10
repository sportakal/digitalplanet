<?php

namespace Sportakal\Digitalplanet;

use Sportakal\Digitalplanet\Requests\GetFormsAuthenticationTicketRequest;
use Sportakal\Digitalplanet\Requests\RequestInterface;
use Sportakal\Digitalplanet\Utils\Curl;
use Sportakal\Digitalplanet\Utils\XmlCreator;
use Sportakal\Digitalplanet\Utils\XmlParser;

class Make
{
    protected RequestInterface $request;
    protected Response $response;
    protected Options $options;

    public static function exec(RequestInterface $request, Options $options): Response
    {
        return (new self($request, $options))->send();
    }

    public static function execOptions(RequestInterface $request, Options $options): Response
    {
        return (new self($request, $options))->send();
    }

    public function __construct(RequestInterface $request, Options $options)
    {
        $this->request = $request;
        $this->options = $options;
        $this->createXml();
    }

    public function getActionName(): string
    {
        $path_string = get_class($this->request);
        $path_array = explode('\\', $path_string);
        $className = array_pop($path_array);
        return explode('Request', $className)[0];
    }

    public function createValuesArray(): array
    {
        $values = $this->request->toArray();
        if ($this->request->requiresAuthentication()) {
            $values['ticket'] = $this->options->getTicket();
            $values['Ticket'] = $this->options->getTicket();
        }

        return [
            $this->getActionName() => [
                    '_attributes' => [
                        'xmlns' => 'http://tempuri.org/',
                    ],
                ]
                + $values,
        ];
    }

    protected function createXml()
    {
        return (new XmlCreator($this->createValuesArray(), true))->getXml();
    }

    /**
     * @throws \JsonException
     */
    protected function send()
    {
//        if ($this->request->requiresAuthentication()) {
//            debug($this->createXml(),false);
//        }
        $url = $this->options->getUrl();
        $headers = [
            'Content-Type: text/xml; charset=utf-8',
            'SOAPAction: "http://tempuri.org/' . $this->getActionName() . '"',
        ];
        $body = $this->createXml();
        $client = new Curl($url, $body, $headers, $this->getActionName());
        return $this->response = $client->getResponse();
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
