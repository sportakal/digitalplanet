<?php

namespace Sportakal\Digitalplanet\Requests;

class GetFormsAuthenticationTicket extends MakeRequest
{
    public function __construct(string $corporate_code,
                                string $login_name,
                                string $password)
    {
        $this->SOAPAction = '"http://tempuri.org/GetFormsAuthenticationTicket"';
        $this->require_ticket = false;

        $this->nodeName = 'GetFormsAuthenticationTicket';
        $this->nodeValue = [
            'CorporateCode' => $corporate_code,
            'LoginName' => $login_name,
            'Password' => $password,
        ];
        $this->nodeAttributes = [
            'xmlns' => 'http://tempuri.org/',
        ];
    }


}
