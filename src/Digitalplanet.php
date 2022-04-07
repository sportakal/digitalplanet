<?php

namespace Sportakal\Digitalplanet;

use Sportakal\Digitalplanet\Exceptions\OptionsException;
use Sportakal\Digitalplanet\Requests\GetFormsAuthenticationTicket;

class Digitalplanet
{
    protected $corporateCode;
    protected $loginName;
    protected $password;
    protected $ticket;
    protected $url; // 'https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx';

    public function __construct(
        $corporateCode = null,
        $loginName = null,
        $password = null,
        $url = null
    )
    {
        $this->corporateCode = $corporateCode ?? config('digitalplanet.options.corporate_code') ?? throw new OptionsException('Corporate Code is required');
        $this->loginName = $loginName ?? config('digitalplanet.options.login_name') ?? throw new OptionsException('Login Name is required');
        $this->password = $password ?? config('digitalplanet.options.password') ?? throw new OptionsException('Password is required');
        $this->url = $url ?? config('digitalplanet.options.url') ?? throw new OptionsException('URL is required');
    }

    /**
     * @return void
     */
    public function createTicket()
    {
        $GetFormsAuth = new GetFormsAuthenticationTicket($this->corporateCode, $this->loginName, $this->password);
        $GetFormsAuth->setOptions($this);
        $response = $GetFormsAuth->send();
        $this->ticket = $response->getSoapResult();
    }

    /**
     * @return mixed
     */
    public function getTicket()
    {
        if (empty($this->ticket)) {
            $this->createTicket();
        }
        return $this->ticket;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }


}
