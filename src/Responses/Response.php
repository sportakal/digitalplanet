<?php

namespace Sportakal\Digitalplanet\Responses;

class Response
{
    protected \Illuminate\Http\Client\Response $response;
    protected string $serviceName;

    public function __construct($response, $serviceName)
    {
        $this->response = $response;
        $this->serviceName = $serviceName;
    }

    /**
     * @param \Illuminate\Http\Client\Response $response
     */
    public function setResponse(\Illuminate\Http\Client\Response $response)
    {
        return $this->response = $response;
    }

    /**
     * @param string $serviceName
     */
    public function setServiceName(string $serviceName): void
    {
        $this->serviceName = $serviceName;
    }

    public function getRawBody()
    {
        return $this->response->body();
    }

    public function getXml()
    {
        return $this->response->getBody()->getContents();
    }

    /*
     * @return array
     */
    public function getBody()
    {
        $body = $this->response->body();
        $body = strtr($body, ['<soap:' => '<soap', '</soap:' => '</soap']);
        $simplxml_object = simplexml_load_string($body);
        $json = json_encode($simplxml_object);
        return json_decode($json, TRUE, 512, JSON_THROW_ON_ERROR);
    }

    /*
     * @return array
     */
    public function getSoapBody()
    {
        return (array)$this->getBody()['soapBody'];
    }

    /*
    * @return array
    */
    public function getSoapResponse()
    {
        return (array)$this->getSoapBody()[$this->serviceName . 'Response'];
    }

    /*
   * @return mixed
   */
    public function getSoapResult()
    {
        return $this->getSoapResponse()[$this->serviceName . 'Result'];
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getResponseCode()
    {
        return $this->response->getStatusCode();
    }

    public function getResponseBody()
    {
        return $this->response->getBody();
    }

    public function getResponseHeaders()
    {
        return $this->response->getHeaders();
    }

    public function getResponseHeader($header)
    {
        return $this->response->getHeader($header);
    }
}
