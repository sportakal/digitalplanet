<?php

namespace Sportakal\Digitalplanet;

class Options
{
    protected string $corporateCode;
    protected string $loginName;
    protected string $password;
    protected string $url; // 'https://trendyolintegrationservicewithoutmtomtest.digitalplanet.com.tr/IntegrationService.asmx';
    protected string $ticket;

    public function __construct(string $corporateCode, string $loginName, string $password, string $url)
    {
        $this->corporateCode = $corporateCode;
        $this->loginName = $loginName;
        $this->password = $password;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getCorporateCode(): string
    {
        return $this->corporateCode;
    }

    /**
     * @param string $corporateCode
     */
    public function setCorporateCode(string $corporateCode): void
    {
        $this->corporateCode = $corporateCode;
    }

    /**
     * @return string
     */
    public function getLoginName(): string
    {
        return $this->loginName;
    }

    /**
     * @param string $loginName
     */
    public function setLoginName(string $loginName): void
    {
        $this->loginName = $loginName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     * @throws \JsonException
     */
    public function getTicket(): string
    {
        if (empty($this->ticket)) {
            $this->createTicket();
        }
        return $this->ticket;
    }

    /**
     * @return void
     * @throws \JsonException
     */
    protected function createTicket(): void
    {
        $GetFormsAuthenticationTicketRequest = (new \Sportakal\Digitalplanet\Requests\GetFormsAuthenticationTicketRequest($this));
        $response = \Sportakal\Digitalplanet\Make::exec($GetFormsAuthenticationTicketRequest, $this);

        $ticket = $response->getValue('GetFormsAuthenticationTicketResult');
        if (empty($ticket)) {
            throw new \Exception('Credentials are not valid');
        }

        $this->ticket = $ticket;
    }

}
