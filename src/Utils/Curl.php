<?php

namespace Sportakal\Digitalplanet\Utils;

use Sportakal\Digitalplanet\Response;

class Curl
{
    protected string $url;
    protected string $body;
    protected array $headers;
    protected string $requestMethod;
    protected Response $response;

    /**
     * @param string $url
     * @param array $headers
     * @param string $body
     */
    public function __construct(string $url, string $body, array $headers, string $requestMethod)
    {
        $this->url = $url;
        $this->body = $body;
        $this->headers = $headers;
        $this->requestMethod = $requestMethod;
        $this->make();
    }

    protected function make()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $this->body,
            CURLOPT_HTTPHEADER => $this->headers, //['Content-Type: text/xml; charset=utf-8', 'SOAPAction: "http://tempuri.org/GetFormsAuthenticationTicket"']
        ));

        $result = curl_exec($curl);
        curl_close($curl);
        $this->response = new Response($curl, $result, $this->requestMethod);
    }

    public function getResponse()
    {
        return $this->response;
    }


}
