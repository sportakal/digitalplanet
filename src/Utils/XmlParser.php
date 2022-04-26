<?php

namespace Sportakal\Digitalplanet\Utils;

class XmlParser
{
    protected string $xml;
    protected array $array;

    /**
     * @throws \JsonException
     */
    public function __construct(string $xml)
    {
        $this->xml = $xml;
        $this->parse();
    }

    /**
     * @throws \JsonException
     */
    protected function parse()
    {
        $body = $this->xml;
        $body = strtr($body, ['<soap:' => '<soap', '</soap:' => '</soap']);
        $simplexml_object = simplexml_load_string($body);
        $json = json_encode($simplexml_object, JSON_THROW_ON_ERROR);
        $this->array = json_decode($json, TRUE, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @return string|array|null
     */
    public function getValue(string $key, $arr = null)
    {
        $foundValue = null;
        if (!$arr) {
            $arr = $this->array;
        }
        foreach ($arr as $k => $v) {
            if ($k === $key) {
                $foundValue = $v;
            } elseif (is_array($v) && count($v) > 0) {
                $foundValue = $this->getValue($key, $v);
            }
        }
        return $foundValue;
    }

}
