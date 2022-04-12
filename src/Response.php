<?php

namespace Sportakal\Digitalplanet;

use Sportakal\Digitalplanet\Utils\Curl;
use Sportakal\Digitalplanet\Utils\XmlParser;

class Response
{
    protected $curl;
    protected string $result;
    protected string $requestMethod;

    public function __construct($curl, string $result, string $requestMethod)
    {
        $this->curl = $curl;
        $this->result = $result;
        $this->requestMethod = $requestMethod;
    }

    /**
     * @return string
     */
    public function getRawBody(): string
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return curl_getinfo($this->curl);
    }

    /**
     * @return array
     * @throws \JsonException
     */
    public function getArray(): array
    {
        return (new XmlParser($this->getRawBody()))->getArray();
    }

    /**
     * @param $key
     * @return array|string|null
     * @throws \JsonException
     */
    public function getValue($key)
    {
        return (new XmlParser($this->getRawBody()))->getValue($key);
    }

    /**
     * @return array|string
     * @throws \JsonException
     */
    public function getResult()
    {
        return $this->getValue($this->requestMethod . 'Result');
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->getResult()['ServiceResult'] === 'Successful';
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function getStatus(): string
    {
        return $this->getResult()['ServiceResult'];
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function getStatusDesc(): string
    {
        return $this->getResult()['ServiceResultDescription'];
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function getErrorCode(): string
    {
        return $this->getResult()['ErrorCode'];
    }
}
