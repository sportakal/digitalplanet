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
     * @param string $body
     * @param array $headers
     * @param string $requestMethod
     */
    public function __construct(string $url, string $body, array $headers = [], string $requestMethod = '')
    {
        $this->url = $url;
        $this->body = trim(preg_replace('/\s\s+/', '', $body));
        $this->headers = $headers;
        $this->requestMethod = $requestMethod;
        $this->make();
    }

    protected function make(): void
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
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($http_code !== 200) {
            throw new \Exception("Status Code: $http_code Error: $result");
        }
        $this->response = new Response($curl, $result, $this->requestMethod);
    }

    public function getResponse(): Response
    {
        return $this->response;
    }


}
